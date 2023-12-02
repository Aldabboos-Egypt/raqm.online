<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ClinicController;
use App\Http\Controllers\Api\GlobalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['app_auth_api']], function () {

// Auth
    Route::post('auth/login', [AuthController::class, 'login']);
    Route::post('auth/register', [AuthController::class, 'register']);
    Route::post('auth/forget-password', [AuthController::class, 'forgetPassword']);
    Route::post('auth/reset-password', [AuthController::class, 'resetPassword']);
    Route::post('auth/external-login', [AuthController::class, 'externalLogin']);
    Route::post('auth/verify', [AuthController::class, 'verify']);

    Route::post('/clinics', [ClinicController::class, 'index']);
    Route::post('/clinics/{id}/phone', [ClinicController::class, 'getPhone']);

    Route::post('/clinics/show/{id}', [ClinicController::class, 'show']);
    Route::post('/clinics/search', [ClinicController::class, 'search']);

    Route::post('/categories', [GlobalController::class, 'categories']);
    Route::post('/subcategories', [GlobalController::class, 'subCategories']);
    Route::post('/ads', [GlobalController::class, 'ads']);

    Route::post('/blog-categories', [BlogController::class, 'blogCategories']);
    Route::post('/blogs', [BlogController::class, 'blogs']);
    Route::post('/blogs/{id}', [BlogController::class, 'getBlog']);

    Route::group(['middleware' => ['auth_api', 'lang']], function () {

        Route::post('auth/me', [AuthController::class, 'me']);
        Route::post('auth/update-profile', [AuthController::class, 'updateProfile']);
        Route::post('auth/favourites', [ClinicController::class, 'favourites']);
        Route::post('ads-view/{id}', [GlobalController::class, 'adsAddView']);
        Route::post('/clinics/send-comment', [ClinicController::class, 'sendComment']);
        Route::post('/clinics/send-request', [ClinicController::class, 'sendRequest']);
        Route::post('/clinics/{id}/favourite', [ClinicController::class, 'favourite']);

    });

});
