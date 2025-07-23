@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<x-form-container 
    title="Edit User" 
    description="Perbarui informasi pengguna dan hak akses"
    :back-route="route('master.users.index')"
    back-text="Kembali ke Daftar User">
    
    <form method="POST" action="{{ route('master.users.update', $user) }}" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Username" name="username" required :error="$errors->first('username')">
                <x-form-input 
                    name="username" 
                    :value="$user->username"
                    placeholder="Masukkan username unik"
                    required />
            </x-form-group>

            <x-form-group label="Nama Lengkap" name="nama" required :error="$errors->first('nama')">
                <x-form-input 
                    name="nama" 
                    :value="$user->nama"
                    placeholder="Masukkan nama lengkap"
                    required />
            </x-form-group>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Password" name="password" :error="$errors->first('password')">
                <x-form-input 
                    type="password" 
                    name="password" 
                    placeholder="Kosongkan jika tidak ingin mengubah password" />
                <p class="mt-1 text-sm text-gray-500">Biarkan kosong jika tidak ingin mengubah password</p>
            </x-form-group>

            <x-form-group label="Role" name="role" required :error="$errors->first('role')">
                <x-form-select name="role" required placeholder="Pilih role pengguna">
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ old('role', $user->role) === 'petugas' ? 'selected' : '' }}>Petugas</option>
                    <option value="dokter" {{ old('role', $user->role) === 'dokter' ? 'selected' : '' }}>Dokter</option>
                    <option value="kasir" {{ old('role', $user->role) === 'kasir' ? 'selected' : '' }}>Kasir</option>
                </x-form-select>
            </x-form-group>
        </div>

        <div class="bg-amber-50 border border-amber-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-amber-700">
                        <strong>Perhatian:</strong> Perubahan role akan mempengaruhi hak akses pengguna. Pastikan role yang dipilih sesuai dengan tanggung jawab pengguna.
                    </p>
                </div>
            </div>
        </div>

        <x-form-actions 
            submit-text="Perbarui User" 
            :cancel-route="route('master.users.index')" />
    </form>
</x-form-container>
@endsection
