@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex min-h-full flex-1">
    <!-- Background Image/Pattern -->
    <div class="relative hidden w-0 flex-1 lg:block">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-600 to-primary-700"></div>
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 backdrop-blur-sm"></div>
        
        <!-- Decorative Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#grid)" />
            </svg>
        </div>
        
        <!-- Content Overlay -->
        <div class="relative flex h-full items-center justify-center px-8">
            <div class="max-w-md text-center">
                <div class="mb-8">
                    <div class="mx-auto h-16 w-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-white mb-4">Selamat Datang</h2>
                <p class="text-lg text-white/90 leading-relaxed">
                    Sistem Informasi Manajemen Klinik yang membantu mengelola data pasien, tindakan medis, dan administrasi klinik dengan mudah dan efisien.
                </p>
            </div>
        </div>
    </div>

    <!-- Login Form -->
    <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <!-- Mobile Logo -->
            <div class="lg:hidden mb-8 text-center">
                <div class="mx-auto h-12 w-12 rounded-full bg-primary-100 flex items-center justify-center">
                    <svg class="h-6 w-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </div>
                <h2 class="mt-4 text-2xl font-bold text-gray-900">Klinik App</h2>
            </div>

            <div>
                <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900">
                    Masuk ke akun Anda
                </h2>
                <p class="mt-2 text-sm leading-6 text-gray-500">
                    Silakan masukkan kredensial Anda untuk mengakses sistem
                </p>
            </div>

            <div class="mt-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            Username
                        </label>
                        <div class="mt-2">
                            <input 
                                type="text" 
                                name="username" 
                                id="username" 
                                value="{{ old('username') }}" 
                                required
                                class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6 transition-colors duration-200"
                                placeholder="Masukkan username Anda"
                            >
                            @error('username')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                            Password
                        </label>
                        <div class="mt-2">
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                required
                                class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6 transition-colors duration-200"
                                placeholder="Masukkan password Anda"
                            >
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button 
                            type="submit"
                            class="flex w-full justify-center rounded-lg bg-primary-600 px-4 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 transition-colors duration-200"
                        >
                            Masuk
                        </button>
                    </div>
                </form>

                <!-- Additional Info -->
                <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                    <h3 class="text-sm font-medium text-gray-900 mb-2">Informasi Login:</h3>
                    <div class="text-xs text-gray-600 space-y-1">
                        <p><span class="font-medium">Admin:</span> Akses penuh sistem</p>
                        <p><span class="font-medium">Petugas:</span> Manajemen pasien & kunjungan</p>
                        <p><span class="font-medium">Dokter:</span> Tindakan medis & resep</p>
                        <p><span class="font-medium">Kasir:</span> Pembayaran & laporan</p>
                    </div>
                </div>

                <!-- Sign Up Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500 transition-colors duration-200">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
