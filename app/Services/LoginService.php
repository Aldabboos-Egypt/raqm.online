<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    private static $instance;

    public const GOOGLE = 'google';
    public const APPLE = 'apple';
    public const FACEBOOK = 'facebook';
    public const PHONE = 'phone';

    private function __construct()
    {
    }

    /**
     * Returns an instance of the LoginService class.
     * @return LoginService An instance of the LoginService class.
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new LoginService();
        }

        return self::$instance;
    }

    /**
     * Login method that handles different login types.
     * @param string $type The type of login method.
     * @throws \InvalidArgumentException If an invalid login method type is provided.
     * @return mixed The result of the login method.
     */
    public function login($type, array $data)
    {
        $data['oauth_type'] = $type;
        return match ($type) {
            self::GOOGLE => $this->externalLogin($data),
            self::FACEBOOK => $this->externalLogin($data),
            self::APPLE => $this->externalLogin($data),
            self::PHONE => $this->emailLogin($data)
        };
    }

    /**
     * Performs an external login based on the provided data.
     *
     * @param array $data The data for the external login.
     * @return User|null The user object if the login is successful, otherwise null.
     */
    public function externalLogin(array $data)
    {
        $data['name'] = $data['name'] ?? "annonymous";
        $data['email'] = $data['email'] ?? $data['oauth_id'];
        $user = User::where('oauth_id', $data['oauth_id'])
            ->where('oauth_type', $data['oauth_type'])
            ->first();

        if (!$user) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'oauth_id' => $data['oauth_id'],
                'oauth_type' => $data['oauth_type'],
            ]);
        }

        return $user;
    }

    /**
     * phoneLogin function.
     *
     * A function that handles the phone login process.
     *
     * @param array $data The data array containing the phone number and UUID.
     * @return User|null The user object if found or created, null otherwise.
     */
    public function emailLogin(array $data)
    {
        $user = User::where('phone', $data['phone'])
        //->where('password', $data['password'])
            ->first();

        if ($user && Hash::check($data['password'], optional($user)->password)) {
            return $user;
        }
        return null;
    }

    public function verify($data)
    {
        $user = User::where('verification_key', $data['verify_code'])->first();
        return $user;
    }

    /**
     * Generates a random code and checks if it already exists in the database.
     *
     * @return int The generated random code.
     */
    public function randCode()
    {
        $code = rand(1000, 9999);
        while (DB::table('users')->where('verification_key', $code)->exists()) {
            $code = rand(1000, 9999);
        }
        return $code;
    }
}
