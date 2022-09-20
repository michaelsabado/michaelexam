<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\AuthController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

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


Route::middleware(['CheckLogin'])->group(function () {

    //login page
    Route::view('/', 'auth.login')->middleware('CheckLogin');

    //when user login normally
    Route::post('/login_user', [AuthController::class, 'login_user']);

    //registration page
    Route::view('/register', 'auth.register');

    //login using paypal
    Route::get('/paypal_login', [PaypalController::class, 'paypal_login']);

    //register page using paypal
    Route::get('/registration', [AuthController::class, 'registration']);

    //submit registration using paypal
    Route::post('/register_user', [AuthController::class, 'register_user']);

    //submit registration normally
    Route::post('/get_register', [AuthController::class, 'get_register']);

});


//profile page
Route::get('/profile', [AuthController::class, 'profile'])->middleware('AuthCheck');

//logout
Route::get('/logout', [AuthController::class, 'logout']);