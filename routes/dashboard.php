<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\ClinicController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'dashboard', 'middleware' => 'guest:admin'], function () {
    // Route Login
    Route::get('login', [AuthController::class, 'view'])->name('dashboard.view_login');
    Route::post('login', [AuthController::class, 'login'])->name('dashboard.login');
});

// After Login Dashboard Routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin']], function () {
    // Logout Route
    Route::post('logout', 'AuthController@logout')->name('dashboard.logout');

    Route::get('lang', 'LangController@changeLang')->name('dashboard.lang');

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');

    // Categories
    Route::get('categories', 'CategoryController@index')->name('dashboard.categories.index');
    Route::get('categories/create', 'CategoryController@create')->name('dashboard.categories.create');
    Route::post('categories/store', 'CategoryController@store')->name('dashboard.categories.store');
    Route::get('categories/edit/{id}', 'CategoryController@edit')->name('dashboard.categories.edit');
    Route::patch('categories/update/{id}', 'CategoryController@update')->name('dashboard.categories.update');
    Route::delete('categories/destroy/{id}', 'CategoryController@destroy')->name('dashboard.categories.destroy');

    // Clinics
    Route::get('clinics', 'ClinicController@index')->name('dashboard.clinics.index');
    Route::get('clinics/create', 'ClinicController@create')->name('dashboard.clinics.create');
    Route::post('clinics/store', 'ClinicController@store')->name('dashboard.clinics.store');
    Route::get('clinics/edit/{id}', 'ClinicController@edit')->name('dashboard.clinics.edit');
    Route::patch('clinics/update/{id}', 'ClinicController@update')->name('dashboard.clinics.update');
    Route::get('clinics/destroy/{id}', 'ClinicController@destroy')->name('dashboard.clinics.destroy');

    Route::get('clinics/quick_edit', 'ClinicController@quickEdit')->name('dashboard.clinics.quick_edit');
    Route::put('clinics/quick_edit', 'ClinicController@quickUpdate')->name('dashboard.clinics.quick_update');
    Route::get('clinic_requests', 'ClinicRequestController@index')->name('dashboard.clinic_requests.index');
    Route::post('clinic_requests/changeStatus', 'ClinicRequestController@changeStatus')->name('dashboard.clinic_requests.changeStatus');
    Route::get('clinic_comments', 'ClinicCommentController@index')->name('dashboard.clinic_comments.index');

    Route::get('clinics/export', [ClinicController::class, 'export'])->name('dashboard.clinics.export');
    Route::get('clinics/import', [ClinicController::class, 'importModal'])->name('dashboard.clinics.import_modal');
    Route::post('clinics/import', [ClinicController::class, 'import'])->name('dashboard.clinics.import');

    Route::post('clinics/is_trust', [ClinicController::class, 'isTrust'])->name('dashboard.clinics.is_trust');

    // Geographics
    Route::get('geographics', 'GeographicController@index')->name('dashboard.geographics.index');
    Route::get('geographics/create', 'GeographicController@create')->name('dashboard.geographics.create');
    Route::post('geographics/store', 'GeographicController@store')->name('dashboard.geographics.store');
    Route::get('geographics/edit/{id}', 'GeographicController@edit')->name('dashboard.geographics.edit');
    Route::patch('geographics/update/{id}', 'GeographicController@update')->name('dashboard.geographics.update');
    Route::delete('geographics/destroy/{id}', 'GeographicController@destroy')->name('dashboard.geographics.destroy');

    // Adds
    Route::get('adds', 'AddController@index')->name('dashboard.adds.index');
    Route::get('adds/create', 'AddController@create')->name('dashboard.adds.create');
    Route::post('adds/store', 'AddController@store')->name('dashboard.adds.store');
    Route::get('adds/edit/{id}', 'AddController@edit')->name('dashboard.adds.edit');
    Route::patch('adds/update/{id}', 'AddController@update')->name('dashboard.adds.update');
    Route::delete('adds/destroy/{id}', 'AddController@destroy')->name('dashboard.adds.destroy');

    // Admins
    Route::get('admins', 'AdminController@index')->name('dashboard.admins.index');
    Route::get('admins/create', 'AdminController@create')->name('dashboard.admins.create');
    Route::post('admins/store', 'AdminController@store')->name('dashboard.admins.store');
    Route::get('admins/edit/{id}', 'AdminController@edit')->name('dashboard.admins.edit');
    Route::patch('admins/update/{id}', 'AdminController@update')->name('dashboard.admins.update');
    Route::delete('admins/destroy/{id}', 'AdminController@destroy')->name('dashboard.admins.destroy');

    // Roles
    Route::get('roles', 'RoleController@index')->name('dashboard.roles.index');
    Route::get('roles/create', 'RoleController@create')->name('dashboard.roles.create');
    Route::post('roles/store', 'RoleController@store')->name('dashboard.roles.store');
    Route::get('roles/edit/{id}', 'RoleController@edit')->name('dashboard.roles.edit');
    Route::patch('roles/update/{id}', 'RoleController@update')->name('dashboard.roles.update');
    Route::delete('roles/destroy/{id}', 'RoleController@destroy')->name('dashboard.roles.destroy');

    // SubCategories
    Route::get('subcategories', 'SubCategoryController@index')->name('dashboard.subcategories.index');
    Route::get('subcategories/create', 'SubCategoryController@create')->name('dashboard.subcategories.create');
    Route::post('subcategories/store', 'SubCategoryController@store')->name('dashboard.subcategories.store');
    Route::get('subcategories/edit/{id}', 'SubCategoryController@edit')->name('dashboard.subcategories.edit');
    Route::patch('subcategories/update/{id}', 'SubCategoryController@update')->name('dashboard.subcategories.update');
    Route::delete('subcategories/destroy/{id}', 'SubCategoryController@destroy')->name('dashboard.subcategories.destroy');
});
