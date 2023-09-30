@extends('dashboard.auth.layouts.auth_templet')

@section('content')
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card login-dark">
                <div>
                    <div><a class="logo" href="#"><img style="width: 100px;" src="{{ asset('assets/images/logo.png') }}"
                                class="img-fluid for-light" src="#" alt="looginpage">
                            <img class="img-fluid for-dark" src="#" alt="looginpage"></a></div>
                    <div class="login-main">
                        <form class="theme-form" action="{{ route('dashboard.login') }}" method="post">
                            @csrf
                            <h4>{{ __('lang.login') }}</h4>
                            <p>{{ __('lang.enter_your_email') }} &amp; {{ __('lang.password_to_login') }}</p>
                            <div class="form-group">
                                <label class="col-form-label">{{ __('lang.email') }}</label>
                                <input name="email" class="form-control" type="email" required=""
                                    placeholder="Test@gmail.com">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">{{ __('lang.password') }}</label>
                                <div class="form-input position-relative">
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">
                                    <div class="show-hide"><span class="show"> </span></div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="checkbox p-0">
                                    <input id="checkbox1" type="checkbox">
                                    <label class="text-muted" for="checkbox1">{{ __('lang.remember_me') }}</label>
                                    {{-- </div><a class="link" href="forget-password.html">Forgot password?</a> --}}
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100"
                                            type="submit">{{ __('lang.login') }}</button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
