<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterVisitorController;

Route::get('/', function () {
    return view('index');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/registerVisitor', [RegisterVisitorController::class, 'index'])->name('registerVisitor');
    Route::post('/registerVisitor', [RegisterVisitorController::class, 'registerVisitor']);
});


// Route : Logout
Route::post('/logout', LogoutController::class);


// Route : Admin Hub
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::resource('/santris', \App\Http\Controllers\Admin\SantriController::class);
});


// Route : Santri Hub
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::resource('/home', App\Http\Controllers\Student\HomeController::class);
});


// Route : Employee Hub
Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function () {
    Route::resource('/home', App\Http\Controllers\Employee\HomeController::class);
});

Route::middleware(['auth', 'role:visitor'])->name('visitor.')->group(function () {
    Route::resource('/home', App\Http\Controllers\Visitor\HomeController::class);
});