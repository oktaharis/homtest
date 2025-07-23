@extends('layouts.app')

@section('title', 'Pegawai')

@section('content')
<div class="max-w-7xl mx-auto">
    <x-table-header 
        title="Data Pegawai" 
        description="Kelola informasi pegawai klinik"
        :add-route="route('master.pegawai.create')" 
        add-text="Tambah Pegawai" />
    
    <x-search-box placeholder="Cari berdasarkan nama pegawai atau jabatan..." />
    
    <x-data-table :headers="['ID', 'Nama Pegawai', 'Jabatan', 'User Account', 'Aksi']">
        @forelse ($pegawai as $item)
            <x-table-row 
                :edit-route="route('master.pegawai.edit', $item)" 
                :delete-route="route('master.pegawai.destroy', $item)"
                delete-confirm="Hapus pegawai {{ $item->nama }}?">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8">
                            <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                <span class="text-sm font-medium text-indigo-700">{{ substr($item->nama, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">#{{ $item->id }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $item->jabatan }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($item->user)
                        <div class="flex items-center">
                            <div class="text-sm text-gray-900">{{ $item->user->username }}</div>
                            <span class="ml-2 inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                {{ ucfirst($item->user->role) }}
                            </span>
                        </div>
                    @else
                        <span class="text-sm text-gray-400">Tidak ada akun</span>
                    @endif
                </td>
            </x-table-row>
        @empty
            <x-empty-state 
                message="Belum ada data pegawai" 
                description="Tambahkan pegawai untuk memulai" />
        @endforelse
    </x-data-table>
    
    @if($pegawai->hasPages())
        <div class="mt-6">
            {{ $pegawai->links('components.pagination') }}
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeTableSearch();
});
</script>
@endsection
