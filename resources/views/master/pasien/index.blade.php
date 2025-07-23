@extends('layouts.app')

@section('title', 'Pasien')

@section('content')
<div class="max-w-7xl mx-auto">
    <x-table-header 
        title="Data Pasien" 
        description="Kelola informasi pasien klinik"
        :add-route="route('master.pasien.create')" 
        add-text="Tambah Pasien" />
    
    <x-search-box placeholder="Cari berdasarkan nama pasien atau alamat..." />
    
    <x-data-table :headers="['ID', 'Nama Pasien', 'Alamat', 'Wilayah', 'Tanggal Lahir', 'Usia', 'Aksi']">
        @forelse ($pasien as $item)
            <x-table-row 
                :edit-route="route('master.pasien.edit', $item)" 
                :delete-route="route('master.pasien.destroy', $item)"
                delete-confirm="Hapus data pasien {{ $item->nama }}?">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8">
                            <div class="h-8 w-8 rounded-full bg-pink-100 flex items-center justify-center">
                                <span class="text-sm font-medium text-pink-700">{{ substr($item->nama, 0, 1) }}</span>
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
                <td class="px-6 py-4">
                    <div class="text-sm text-gray-900 max-w-xs truncate" title="{{ $item->alamat }}">
                        {{ $item->alamat }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ $item->wilayah ? $item->wilayah->nama : '-' }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d/m/Y') }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ \Carbon\Carbon::parse($item->tanggal_lahir)->age }} tahun
                    </div>
                </td>
            </x-table-row>
        @empty
            <x-empty-state 
                message="Belum ada data pasien" 
                description="Tambahkan pasien untuk memulai" />
        @endforelse
    </x-data-table>
    
    @if($pasien->hasPages())
        <div class="mt-6">
            {{ $pasien->links('components.pagination') }}
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeTableSearch();
});
</script>
@endsection
