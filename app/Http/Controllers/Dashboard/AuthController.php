<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function view()
    {
        return view('dashboard.auth.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->route('dashboard.index');
        }

        alert()->error('',__('lang.email_or_password_error'));
        return redirect()->route('dashboard.view_login');
    }

    public function logout() {
        if(auth('admin')->check()){
            auth('admin')->logout();
            request()->session()->invalidate();
        }
        return redirect(route('dashboard.view_login'));
    }
}


