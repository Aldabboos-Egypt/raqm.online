<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ExternalLogin;
use App\Http\Requests\Auth\LoginApi;
use App\Http\Requests\Auth\RegisterApi;
use App\Http\Requests\Auth\VerifyUser;
use App\Models\User;
use App\Notifications\Seller\AccountConfirmation;
use App\Services\LoginService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{
    /**
     * externalLogin function based on the oauth_type [ google, apple ].
     * @param ExternalLogin $request The request object containing the login data.
     * @throws Exception The exception that can be thrown during the function execution.
     * @return mixed The authentication result.
     */
    public function externalLogin(ExternalLogin $request)
    {
        $data = $request->all();
        $user = User::where('oauth_id', $data['oauth_id'])->where('oauth_type', $data['oauth_type'])->first();
        return $this->authAndResponse($user);
    }

    /**
     * Logs in a user with phone or uuid.
     * @param LoginApi $request The login request object.
     * @throws Exception If an error occurs during the login process.
     * @return void
     */
    public function login(LoginApi $request)
    {
        $data = $request->only(['email', 'password']);
        $user = LoginService::getInstance()->login(LoginService::PHONE, $data);
        return $this->authAndResponse($user);
    }

    public function register(RegisterApi $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['status'] = User::PENDING;
        $data['registration_date'] = Carbon::now();
        $data['verification_key'] = LoginService::getInstance()->randCode();
        $user = User::create($data);

        try {
            $user->notify(new AccountConfirmation($user->verification_key, $user->username));
        } catch (\Exception $e) {

        }

        return responseJson(false, trans('verify_code_sent_to_your_email'), ['verfiy' => true]);
    }

    public function forgetPassword(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return responseJson(false, trans('email_not_found'), null);
        }

        $user->update([
            'verification_key' => LoginService::getInstance()->randCode(),
        ]);

        try {
            $user->notify(new AccountConfirmation($user->verification_key, $user->username));
        } catch (\Exception $e) {

        }

        return responseJson(true, trans('verify_code_sent_to_your_email'), ['reset' => true]);
    }

    public function resetPassword(Request $request)
    {
        $data = $request->all();
        $user = User::where('verification_key', $data['verification_key'])->first();
        if (!$user) {
            return responseJson(false, trans('admin.invalid_verificatation_code'), null);
        }

        $user->update([
            'password' => bcrypt($data['password']),
            'status' => User::ACTIVE,
        ]);
        $token = auth('api')->login($user);
        return $this->respondWithToken($token);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->only(['username', 'phone', 'password', 'image']);
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }
        $user = auth('api')->user();
        try {
            if ($request->hasFile('image')) {
                if ($user->image) {
                    File::delete($user->image);
                }
                $data['image'] = uploadFile($request->file('image'), 'uploads/users/');
            }

            $user->update($data);
            return responseJson(true, trans('lang.done'));
        } catch (\Exception $e) {
            return responseJson(false, $e->getMessage());
        }
    }

    /**
     * Verify the user based on the given request.
     * @param Request $request the request object containing the verification code
     * @return Some_Return_Value the response with the authentication token
     */
    public function verify(VerifyUser $request)
    {
        $user = LoginService::getInstance()->verify($request->only(['verify_code']));
        if ($user) {
            $user->update([
                'status' => User::ACTIVE,
            ]);
            $token = auth('api')->login($user);
            return $this->respondWithToken($token);
        } else {
            return responseJson(false, trans('admin.invalid_verificatation_code'), null);
        }

    }

    /**
     * Authenticate the user and return a response.
     * @param object $user The user object to be authenticated.
     * @return mixed The response from the authentication process.
     */
    public function authAndResponse($user)
    {
        if (!$user) {
            return responseJson(false, trans('email_or_password_error'), null);
        }
        if (optional($user)->status == User::ACTIVE) {
            $token = auth('api')->login($user);
            return $this->respondWithToken($token);
        } else {
            return responseJson(false, trans('active_your_account'), ['verfiy' => true]);
        }

    }

    public function me()
    {
        return auth('api')->user();
    }

    /**
     * Log the user out (Invalidate the token)
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();
        return responseJson(true, trans('admin.logged_out'), []);
    }

    /**
     * Refresh a token.
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     * @param  string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return responseJson(true, null, [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60 * 24 * 7,
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard('api');
    }

}
