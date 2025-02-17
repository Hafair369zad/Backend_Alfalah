<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

Route::middleware([EnsureFrontendRequestsAreStateful::class])->group(function () {
    Route::post('/login', [LoginController::class, 'apiLogin']);
});

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return response()->json([
        'user' => $request->user(),
        'role' => $request->user()->role->role,
    ]);
});

// Middleware untuk proteksi API menggunakan Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Rute untuk admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return response()->json(['message' => 'Welcome Admin']);
        });
    });

    // Rute untuk student
    Route::middleware('role:student')->group(function () {
        Route::get('/student/dashboard', function () {
            return response()->json(['message' => 'Welcome Student']);
        });
    });

    // Rute untuk employee
    Route::middleware('role:employee')->group(function () {
        Route::get('/employee/home', function () {
            return response()->json(['message' => 'Welcome Employee']);
        });
    });

    // Logout (Menghapus token pengguna)
    Route::post('/logout', function (Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    });
    
});
