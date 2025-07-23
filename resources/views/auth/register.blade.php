@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')
<div class="flex min-h-full flex-1">
    <!-- Form Section (Left) -->
    <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <!-- Mobile Logo -->
            <div class="lg:hidden mb-8 text-center">
                <div class="mx-auto h-12 w-12 rounded-full bg-emerald-100 flex items-center justify-center">
                    <svg class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h2 class="mt-4 text-2xl font-bold text-gray-900">Klinik App</h2>
            </div>

            <div>
                <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900">
                    Buat akun baru
                </h2>
                <p class="mt-2 text-sm leading-6 text-gray-500">
                    Daftarkan diri Anda untuk mengakses sistem klinik
                </p>
            </div>

            <div class="mt-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
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
                                class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 transition-colors duration-200"
                                placeholder="Masukkan username unik"
                            >
                            @error('username')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">
                            Nama Lengkap
                        </label>
                        <div class="mt-2">
                            <input 
                                type="text" 
                                name="nama" 
                                id="nama" 
                                value="{{ old('nama') }}" 
                                required
                                class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 transition-colors duration-200"
                                placeholder="Masukkan nama lengkap"
                            >
                            @error('nama')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-medium leading-6 text-gray-900">
                            Role
                        </label>
                        <div class="mt-2">
                            <select 
                                name="role" 
                                id="role" 
                                required
                                class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 transition-colors duration-200"
                            >
                                <option value="">Pilih role pengguna</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="petugas" {{ old('role') === 'petugas' ? 'selected' : '' }}>Petugas</option>
                                <option value="dokter" {{ old('role') === 'dokter' ? 'selected' : '' }}>Dokter</option>
                                <option value="kasir" {{ old('role') === 'kasir' ? 'selected' : '' }}>Kasir</option>
                            </select>
                            @error('role')
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
                                class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 transition-colors duration-200"
                                placeholder="Masukkan password"
                            >
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">
                            Konfirmasi Password
                        </label>
                        <div class="mt-2">
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                id="password_confirmation" 
                                required
                                class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6 transition-colors duration-200"
                                placeholder="Ulangi password"
                            >
                        </div>
                    </div>

                    <div>
                        <button 
                            type="submit"
                            class="flex w-full justify-center rounded-lg bg-emerald-600 px-4 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600 transition-colors duration-200"
                        >
                            Daftar Akun
                        </button>
                    </div>
                </form>

                <!-- Role Information -->
                <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                    <h3 class="text-sm font-medium text-gray-900 mb-2">Informasi Role:</h3>
                    <div class="text-xs text-gray-600 space-y-1">
                        <p><span class="font-medium">Admin:</span> Akses penuh ke semua fitur sistem</p>
                        <p><span class="font-medium">Petugas:</span> Manajemen pasien & registrasi kunjungan</p>
                        <p><span class="font-medium">Dokter:</span> Tindakan medis & pemberian resep</p>
                        <p><span class="font-medium">Kasir:</span> Proses pembayaran & laporan keuangan</p>
                    </div>
                </div>

                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="font-medium text-emerald-600 hover:text-emerald-500 transition-colors duration-200">
                            Login di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Image/Pattern (Right) -->
    <div class="relative hidden w-0 flex-1 lg:block">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-600 to-emerald-800"></div>
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 backdrop-blur-sm"></div>
        
        <!-- Decorative Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="register-grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#register-grid)" />
            </svg>
        </div>
        
        <!-- Content Overlay -->
        <div class="relative flex h-full items-center justify-center px-8">
            <div class="max-w-md text-center">
                <div class="mb-8">
                    <div class="mx-auto h-16 w-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-white mb-4">Bergabung dengan Kami</h2>
                <p class="text-lg text-white/90 leading-relaxed">
                    Daftarkan diri Anda untuk mengakses Sistem Informasi Manajemen Klinik yang komprehensif dan mudah digunakan.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
