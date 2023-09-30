<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Auth\RegisterApi;
use App\Http\Requests\Auth\VerifyUser;
use App\Models\User;
use App\Notifications\Seller\AccountConfirmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends GeneralController
{
    protected $path = 'users';
    private $via = 'phone';

    protected $cacheTime = 15;
    protected $usageLimit = 5;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Register User
     * @param RegisterUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterApi $request)
    {
        // Get all data from request
        $inputs = $request->validated();
        // Set Password in data inputs
        $inputs['password'] = bcrypt($request->input('password'));
        // Check If Request Has File Image
        if ($request->hasFile('image')) {
            // Set Image in inputs data
            $inputs['image'] = $this->uploadImage($request->file('image'), $this->path, null, 600);
        }
        // Set Verification Key In Inputs Request
        $inputs['verification_key'] = $this->keyUser('verification_key');
        // Set Date Verify Code
        $inputs['date_verify_key'] = date('Y-m-d H:i:s');
        $inputs['registration_date'] = date('Y-m-d H:i:s');
        // Store Data in DB
        DB::beginTransaction();
        $data = $this->model->create($inputs);
        // Send Notification To User Via $this->via
        $data->notify(new AccountConfirmation($inputs['verification_key'], $inputs['username'], request()->filled('country_code')));
        DB::commit();
        return $this->sendResponse([], __('lang.success_register', ['via' => __('lang.' . (!request()->filled('country_code') ? SharingServiceProvider::VIA : 'email'))]), 201);
    }

    /**
     * Verify User Account
     * @param VerifyUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(VerifyUser $request)
    {
        // Get Inputs From Request
        $inputs = $request->validated();
        // Get Member Related to Request Code
        $data = $this->model->where('verification_key', $inputs['verify_code'])->first();
        $from = Carbon::parse($data->date_verify_key)->addMinutes(60)->format('Y-m-d H:i:s');
        $to = Carbon::now()->format('Y-m-d H:i:s');
        // Check If Date Verify Key
        if ($to > $from) {
            return $this->errorResponse(__('lang.invalid_code'), [], 422);
        }

        $data->update(['status' => 'active', 'verification_key' => null, 'date_verify_key' => date('Y-m-d H:i:s')]);

        $token = JWTAuth::fromUser($data);
        return $this->createNewToken($token, __('lang.success_confirm'));
    }

    /**
     * Verify User Account
     * @param VerifyUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkVerifyCode(Request $request)
    {
        // // Get Inputs From Request
        // $inputs = $request->all();
        // // Get Member Related to Request Code
        // $data = PasswordReset::where('token', $inputs['verify_code'])->first();

        // //return $data;
        // if (!$data) {
        //     return $this->errorResponse(__('lang.invalid_code'), [], 401);
        // } else {
        //     return $this->sendResponse([
        //         'valid' => true,
        //     ]);
        // }
    }

    /**
     * Login User
     * @param LoginUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginUser $request)
    {
        // Get Data Credentials Request
        $credentials = $this->credentials($request);
        // Check If Credentials Has Error
        if (!$credentials) {
            return $this->errorResponse(__('lang.invalid_data'), [], 422);
        }

        // Check If Has Cache Key Agent IP
        if (Cache::has(request()->ip()) && (Cache::get(request()->ip())['used'] >= 5)) {
            return $this->manyLoginAttempts();
        }
        // IF Invalid Credentials Return Error
        if (!$token = auth('api')->attempt($credentials)) {
            $this->sendFailedLoginResponse();
            return $this->errorResponse(__('lang.invalid_data'), [], 401);
        }
        // Check If Account Not Verified
        if ($this->userApi()->isPending()) {
            return $this->verifyAccount();
        }
        return $this->createNewToken($token);
    }

    public function manyLoginAttempts()
    {
        $agentIp = request()->ip();
        if (Cache::has($agentIp) && (Cache::get($agentIp)['used'] >= 5)) {
            $loginTimeout = Cache::get($agentIp)['login_timeout']->format('Y-m-d H:i:s');
            $minutes = $this->cacheTime - Carbon::now()->diffInMinutes($loginTimeout);
            return $this->errorResponse(__('auth.login_time_out', ['minutes' => ($minutes > 0 ? $minutes : 1)]), [], 429);
        }
    }

    public function sendFailedLoginResponse()
    {
        $agentIp = request()->ip();
        // Check If Exists Cache Key Agent Ip
        if (Cache::has($agentIp)) {
            $cachedData = Cache::get($agentIp);
            $cachedData['used'] = $cachedData['used'] + 1;
            if ($cachedData['used'] == 5) {
                $cachedData['login_timeout'] = now();
            }
            Cache::put($agentIp, $cachedData, now()->addMinutes($this->cacheTime));
        } else {
            $data = [
                'used' => 1,
                'date' => now(),
            ];
            Cache::put($agentIp, $data, now()->addMinutes($this->cacheTime));
        }
    }

    /**
     * Logout User
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        // Logout User
        auth('api')->logout(true);
        auth('api')->invalidate(true);
        return $this->sendResponse([], __('lang.success_logout'));
    }

    /**
     * Send Verify Code To User
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyAccount()
    {
        // Get Data By ID
        $data = $this->model->find($this->userApi()->id);
        // Logout User
        auth('api')->logout(true);
        // Update Confirmation Key
        $code = $this->keyUser('verification_key');
        DB::beginTransaction();
        $data->update(['verification_key' => $code, 'date_verify_key' => date('Y-m-d H:i:s')]);
        // Send Code To Seller By Email
        $data->notify(new AccountConfirmation($code, $data->username));
        DB::commit();
        return $this->errorResponse(__('lang.not_confirmed', ['via' => __('lang.' . $this->via)]), [], 403);
    }

    public function refresh()
    {
        return $this->createNewToken(auth('api')->refresh());
    }

    private function createNewToken($token, $msg = null)
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ];
        return $this->sendResponse($data, $msg);
    }

    /**
     * Filter User Credentials
     * @param $request
     * @return array|bool
     */
    private function credentials($request)
    {
        $inputs = $request->validated();
        // dd($inputs);
        if (is_numeric($inputs['email_or_phone'])) {
            return ['phone' => $inputs['email_or_phone'], 'password' => $inputs['password']];
        } elseif (filter_var($inputs['email_or_phone'], FILTER_VALIDATE_EMAIL)) {
            return ['email' => $inputs['email_or_phone'], 'password' => $inputs['password']];
        }
        return false;
    }

    public function getVerfiyCodeForTest()
    {
        $key = 'phone';
        if (is_numeric(request()->email_or_phone)) {
            $key = 'phone';
        } elseif (filter_var(request()->email_or_phone, FILTER_VALIDATE_EMAIL)) {
            $key = 'email';
        }

        $code = DB::table('password_resets')->where($key, request()->email_or_phone)->where('role', 'user')->latest()->first();

        $data = [
            'code' => optional($code)->token,
        ];
        return $this->sendResponse($data);
    }
}
