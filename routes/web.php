<?php

use App\Http\Controllers\UserController;
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
// Route::view('/forget', 'emails.forgot-password', ['name' => 'Sourav Dutt', 'link' => 'test-link']);


Route::middleware('guest')->group(function () {
    Route::get('/', [UserController::class, 'signin'])->name('signin');
    Route::post('/signin', [UserController::class, 'signinSubmit'])->name('signin-submit');
    Route::get('/signup', [UserController::class, 'signup'])->name('signup');
    Route::post('/signup', [UserController::class, 'signupSubmit'])->name('signup-submit');
    Route::get('/forgotPassword', [UserController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgotPassword', [UserController::class, 'forgotPasswordSubmit'])->name('forgotPassword-submit');
    Route::get('/reset-password', [UserController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset-password', [UserController::class, 'resetPasswordSubmit'])->name('resetPassword-submit');
});

Route::prefix('/user')->middleware('auth')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
