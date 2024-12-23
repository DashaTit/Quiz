<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminCheck;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
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

Route::get("/subjects/show/{id}", [AdminController::class, 'showSubject']);

Route::get('/admin', [AdminController::class, 'showAdmin'])->name('admin')->middleware(AdminCheck::class);

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

Route::post('admin/add_subject', [AdminController::class, 'setSubject'])->name('add_subject');