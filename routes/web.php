<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

// // external login
// Route::get('/', function () {return view('welcome');});

// Route::get('/{route}', function ($route) {

//     switch ($route) {
//         case 'auth/g/redirect':
//             return Socialite::driver('google')->redirect();
//         case 'auth/f/redirect':
//             return Socialite::driver('facebook')->redirect();
//         case 'login':
//             if (!request()->oauth_id) {
//                 try {
//                     $data = Socialite::driver('google')->user();
//                     $user = User::createFromGoogle($data);

//                     if ($user) {
//                         return back()->with(['oauth_id' => $user->oauth_id]);
//                     }

//                 } catch (\Exception $e) {
//                     return view('welcome');
//                 }
//             }
//             return view('welcome');
//         default:
//             return view('welcome');
//     }

// });

Route::get('/login', function () {
    // create user for google
    if (!request()->oauth_id) {
        try {
            $data = Socialite::driver('google')->user();
            $user = User::createFromGoogle($data);

            if ($user) {
                return redirect(env('FRONT_URL') . '/login?oauth_type=google&oauth_id=' . $user->oauth_id);
            }

        } catch (\Exception $e) {
        }
        try {
            $data = Socialite::driver('facebook')->user();
            $user = User::createFromGoogle($data);

            if ($user) {
                return redirect(env('FRONT_URL') . '/login?oauth_type=facebook&oauth_id=' . $user->oauth_id);
            }

        } catch (\Exception $e) {
        }
    }
    return redirect(env('FRONT_URL') . '/login');

})->name('login');

Route::get('/auth/g/redirect', function () {
    return Socialite::driver('google')->redirect();
});
// add facebook
Route::get('/auth/f/redirect', function () {
    return Socialite::driver('facebook')->redirect();
});

// Route::get('/', function () {return view('welcome');});
// Route::get('/v/{id}', function () {return view('welcome');});
// Route::get('/home', function () {return view('welcome');});
// Route::get('/search', function () {return view('welcome');});
// Route::get('/login', function () {
//     // create user for google
//     if (!request()->oauth_id) {
//         try {
//             $data = Socialite::driver('google')->user();
//             $user = User::createFromGoogle($data);

//             if ($user) {
//                 return redirect()->route('login', ['oauth_id' => $user->oauth_id]);
//             }

//         } catch (\Exception $e) {
//             return view('welcome');
//         }
//     }
//     return view('welcome');
// })->name('login');
// Route::get('/register', function () {return view('welcome');});
// Route::get('/verify', function () {return view('welcome');});
// Route::get('/favourite', function () {return view('welcome');});
// Route::get('/profile', function () {return view('welcome');});
// Route::get('/privacy', function () {return view('welcome');});
// Route::get('/terms', function () {return view('welcome');});
