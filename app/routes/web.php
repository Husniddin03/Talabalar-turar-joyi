<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['isStudent', 'isStudent'])->group(function () {
    Route::resource('students', StudentController::class);
});

Route::get ('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::middleware(['isAdmin', 'isAdmin'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('humans', HumanController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
