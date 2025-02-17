<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\LoginRequest;

class LoginController extends Controller
{

    // API
    public function apiLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'role' => $user->role->role,
        ]);
    }

    // Web
    // public function login(LoginRequest $request)
    // {
    //     $validatedData = $request->validated();

    //     // Coba otentikasi dengan kredensial yang diberikan
    //     if (Auth::attempt($validatedData, $request->filled('remember'))) {
    //         $request->session()->regenerate();

    //         if ($request->user()->isActive()) {
    //             if ($request->user()->isVisitor()) {
    //                 return redirect('/home');
    //             } elseif ($request->user()->isStudent()) {
    //                 return redirect('/student/home'); 
    //             } elseif ($request->user()->isEmployee()) {
    //                 return redirect('/employee/home');
    //             } elseif ($request->user()->isAdmin()) {
    //                 return redirect('/admin/dashboard');
    //             } 
    //         } else {
    //             Auth::logout();

    //             $request->session()->invalidate();
    //             $request->session()->regenerateToken();

    //             return back()->with('accountInActive', 'Akun Anda tidak aktif. Silakan hubungi administrator.');
    //         }
    //     }

    //     return back()->with('loginFailed', 'Email atau kata sandi salah.');
    // }



    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
