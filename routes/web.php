<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('admin/login');
});

Route::view('forgot_password', 'auth.reset_password')->name('password.reset');
Route::view('password/reset/success', 'auth.reset_password_success')->name('password.reset.success');
Route::post('password/reset', 'API\Mobile\AuthController@resetPassword');

Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('admin/login', 'Auth\MVCAuthController@login')->name('admin.login');
    Route::post('admin/login', 'Auth\MVCAuthController@authenticate')->name('admin.authenticate');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('/logout', 'Auth\MVCAuthController@logout')->name('admin.logout');

    Route::get('/changePassword', 'Auth\MVCAuthController@changePass')->name('admin.changePass');
    Route::post('/profile/updatePassword', 'Auth\MVCAuthController@updatePassword')->name('admin.updatePassword');
    Route::get('/profile/edit', 'Auth\MVCAuthController@editProfile')->name('admin.editProfile');
    Route::post('/profile/update', 'Auth\MVCAuthController@updateProfile')->name('admin.updateProfile');

    Route::group(['middleware' => 'checkpermission:Dashboard'], function () {
        Route::get('/dashboard', function () {
            return view("admin.dashboard");
        })->name('admin.dashboard');
    });
    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('companies', App\Http\Controllers\CompanyController::class);
    Route::resource('branches', App\Http\Controllers\BranchController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('admins', App\Http\Controllers\AdminController::class);
});


Route::resource('languages', App\Http\Controllers\LanguageController::class);
Route::resource('cashback-offers', App\Http\Controllers\CashbackOfferController::class);
Route::resource('cashback-coupons', App\Http\Controllers\CashbackCouponController::class);