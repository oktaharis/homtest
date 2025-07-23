@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<x-form-container 
    title="Tambah User Baru" 
    description="Buat akun pengguna baru dengan hak akses sesuai kebutuhan"
    :back-route="route('master.users.index')"
    back-text="Kembali ke Daftar User">
    
    <form method="POST" action="{{ route('master.users.store') }}" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Username" name="username" required :error="$errors->first('username')">
                <x-form-input 
                    name="username" 
                    placeholder="Masukkan username unik"
                    required />
            </x-form-group>

            <x-form-group label="Nama Lengkap" name="nama" required :error="$errors->first('nama')">
                <x-form-input 
                    name="nama" 
                    placeholder="Masukkan nama lengkap"
                    required />
            </x-form-group>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Password" name="password" required :error="$errors->first('password')">
                <x-form-input 
                    type="password" 
                    name="password" 
                    placeholder="Masukkan password"
                    required />
            </x-form-group>

            <x-form-group label="Role" name="role" required :error="$errors->first('role')">
                <x-form-select name="role" required placeholder="Pilih role pengguna">
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ old('role') === 'petugas' ? 'selected' : '' }}>Petugas</option>
                    <option value="dokter" {{ old('role') === 'dokter' ? 'selected' : '' }}>Dokter</option>
                    <option value="kasir" {{ old('role') === 'kasir' ? 'selected' : '' }}>Kasir</option>
                </x-form-select>
            </x-form-group>
        </div>

        <x-form-actions 
            submit-text="Buat User" 
            :cancel-route="route('master.users.index')" />
    </form>
</x-form-container>
@endsection
