@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="max-w-7xl mx-auto">
    <x-table-header 
        title="Manajemen Users" 
        description="Kelola pengguna sistem dan hak akses mereka"
        :add-route="route('master.users.create')" 
        add-text="Tambah User" />
    
    <x-search-box placeholder="Cari berdasarkan username, nama, atau role..." />
    
    <x-data-table :headers="['ID', 'Username', 'Nama', 'Role', 'Aksi']">
        @forelse ($users as $user)
            <x-table-row 
                :edit-route="route('master.users.edit', $user)" 
                :delete-route="route('master.users.destroy', $user)"
                delete-confirm="Hapus user {{ $user->username }}?">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8">
                            <div class="h-8 w-8 rounded-full bg-primary-100 flex items-center justify-center">
                                <span class="text-sm font-medium text-primary-700">{{ substr($user->nama, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">#{{ $user->id }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $user->username }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $user->nama }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                        @switch($user->role)
                            @case('admin') bg-purple-100 text-purple-800 @break
                            @case('dokter') bg-blue-100 text-blue-800 @break
                            @case('petugas') bg-green-100 text-green-800 @break
                            @case('kasir') bg-yellow-100 text-yellow-800 @break
                            @default bg-gray-100 text-gray-800
                        @endswitch">
                        {{ ucfirst($user->role) }}
                    </span>
                </td>
            </x-table-row>
        @empty
            <x-empty-state 
                message="Belum ada user terdaftar" 
                description="Tambahkan user pertama untuk memulai" />
        @endforelse
    </x-data-table>
    
    @if($users->hasPages())
        <div class="mt-6">
            {{ $users->links('components.pagination') }}
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeTableSearch();
});
</script>
@endsection
