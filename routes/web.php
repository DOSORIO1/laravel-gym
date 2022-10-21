<?php

use App\Http\Controllers\api\NewPasswordController;
use App\Http\Controllers\WebAuthController;
use Illuminate\Http\Request;
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

Route::get('app/register', function () {
    return view('register');
})->name('viewregister');


Route::get('app/login', function () {
    return view('login');
})->name('viewlogin');


Route::get('app/account', function () {
    return view('account');
})->name('viewaccount');

Route::get('app/forgot', function () {
    return view('forgot-password');
})->name('viewforgot');


Route::get('/password.reset', function (Request $request) {
    return view('password-reset',['token' => $request->token]);
})->name('password.reset');

Route::post('register', [WebAuthController::class, 'register'])
    ->name('register');

Route::post('login', [WebAuthController::class, 'login'])
    ->name('login');

Route::middleware('auth:sanctum')->post('/logout', [WebAuthController::class, 'logout'])
    ->name('logout');



Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword'])
    ->name('forgot');

Route::post('reset-password', [NewPasswordController::class, 'reset'])
    ->name('reset');


    // Route::middleware('auth: ', [NewPasswordController::class, 'reset'])
    // ->name('reset');
