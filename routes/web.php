<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, "home"])->name("home");

Route::get('register', [\App\Http\Controllers\UserController::class, "register"])->name("register");
Route::post('register', [\App\Http\Controllers\UserController::class, "user_register"])->name("user_register");

Route::get('login', [\App\Http\Controllers\UserController::class, "login"])->name("login");
Route::post('login', [\App\Http\Controllers\UserController::class, "user_login"])->name("user_login");

Route::get('logout', [\App\Http\Controllers\UserController::class, "logout"])->name("logout");

Route::get('/user_details/{id}', [\App\Http\Controllers\UserController::class, "user_details"])->name('user_details');
