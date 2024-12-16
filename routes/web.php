<?php

use App\Http\Controllers\UserController;
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
    return view('welcome');
})->name('home');

Route::get('/registration', function () {
    return view('registration');
})->middleware('guest');

Route::get('/login', function () {
    return view('login');
})->middleware('guest');

Route::get('/user', function () {
    return view('user');
})->middleware('auth');

Route::post('auth/register', [UserController::class, 'registartion'])->middleware('guest')->name('register');
Route::post('auth/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('auth/logout', [UserController::class, 'logout'])->name('logout');


Route::post('auth/change', [UserController::class, 'change'])->name('change');