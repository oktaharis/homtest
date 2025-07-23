@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('content')
<x-form-container 
    title="Edit Pegawai" 
    description="Perbarui informasi pegawai"
    :back-route="route('master.pegawai.index')"
    back-text="Kembali ke Daftar Pegawai">
    
    <form method="POST" action="{{ route('master.pegawai.update', $pegawai) }}" class="space-y-6">
        @csrf
        @method('PUT')
        
        <x-form-group label="Akun Pengguna" name="user_id" required :error="$errors->first('user_id')">
            <x-form-select name="user_id" required placeholder="Pilih akun pengguna">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $pegawai->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->username }} ({{ ucfirst($user->role) }})
                    </option>
                @endforeach
            </x-form-select>
        </x-form-group>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Nama Lengkap" name="nama" required :error="$errors->first('nama')">
                <x-form-input 
                    name="nama" 
                    :value="$pegawai->nama"
                    placeholder="Masukkan nama lengkap pegawai"
                    required />
            </x-form-group>

            <x-form-group label="Jabatan" name="jabatan" required :error="$errors->first('jabatan')">
                <x-form-input 
                    name="jabatan" 
                    :value="$pegawai->jabatan"
                    placeholder="Masukkan jabatan pegawai"
                    required />
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
                        <strong>Perhatian:</strong> Pastikan akun pengguna yang dipilih belum terhubung dengan pegawai lain. Perubahan akun akan mempengaruhi hak akses pegawai.
                    </p>
                </div>
            </div>
        </div>

        <x-form-actions 
            submit-text="Perbarui Pegawai" 
            :cancel-route="route('master.pegawai.index')" />
    </form>
</x-form-container>
@endsection
