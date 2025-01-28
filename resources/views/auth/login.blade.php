@extends('layouts.user')
@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-green-100 via-blue-50 to-green-50">
        <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg transform transition-all duration-300 hover:shadow-xl">
            <div class="text-center space-y-3">
                <!-- Logo -->
                <img src="/images/logo-original.png" alt="Logo" class="w-auto h-20 mx-auto transform transition-transform duration-300 hover:scale-105">
                <h5 class="font-bold text-green-800 text-2xl font-rubik tracking-wide">IAIN METRO LAMPUNG</h5>
                <div class="w-16 h-1 bg-green-500 mx-auto rounded-full"></div>
            </div>

            <!-- Pesan Error Validasi -->
            @if ($errors->any())
                <div class="mt-4 p-3 bg-red-50 border-l-4 border-red-500 rounded-md">
                    <ul class="text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Login -->
            <form action="/login" method="POST" class="mt-8 space-y-6">
                @csrf

                <!-- Error Messages -->
                @if (session('loginFailed'))
                    <div class="p-3 bg-red-50 border-l-4 border-red-500 rounded-md">
                        <p class="text-sm text-red-600 font-inter">{{ session('loginFailed') }}</p>
                    </div>
                @endif

                @if (session('accountInActive'))
                    <div class="p-3 bg-red-50 border-l-4 border-red-500 rounded-md">
                        <p class="text-sm text-red-600 font-inter">{{ session('accountInActive') }}</p>
                    </div>
                @endif
                
                <!-- Input Email -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700 font-inter">
                        Alamat Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg outline-none shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 text-sm">
                    </div>
                    @error('email')
                        <span class="text-sm text-red-500 font-inter">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input Password -->
                <div class="space-y-2" x-data="{ show: false }">
                    <label for="password" class="block text-sm font-medium text-gray-700 font-inter">
                        Kata Sandi
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input :type="show ? 'text' : 'password'" id="password" name="password" required
                            class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 text-sm">
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i :class="show ? 'fas fa-eye-slash text-gray-400 hover:text-gray-600' : 'fas fa-eye text-gray-400 hover:text-gray-600'"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-sm text-red-500 font-inter">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500 transition duration-200">
                        <label for="remember_me" class="ml-2 text-sm text-gray-600 hover:text-gray-800 transition duration-200 font-inter">
                            Ingat Saya
                        </label>
                    </div>
                    <a href="" class="text-sm text-blue-600 hover:text-blue-800 transition duration-200 font-inter">
                        Lupa Password?
                    </a>
                </div>

                <!-- Button Masuk -->
                <button type="submit"
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200 transform hover:scale-[1.02] font-inter">
                    Masuk
                </button>
            </form>

            <!-- Link Registrasi -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 font-inter">
                    Belum punya akun?
                    <a href="/register" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-200 font-inter">
                        Daftar
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection