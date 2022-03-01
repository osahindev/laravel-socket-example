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

Route::get('/', function () {
    return view('pages.home');
});

Route::get('register', [\App\Http\Controllers\UserController::class, "register"])->name("register");
Route::post('register', [\App\Http\Controllers\UserController::class, "user_register"])->name("user_register");
