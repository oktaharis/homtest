@extends('layouts.app')

@section('title', 'Obat')

@section('content')
<div class="max-w-7xl mx-auto">
    <x-table-header 
        title="Data Obat" 
        description="Kelola inventori obat dan harga"
        :add-route="route('master.obat.create')" 
        add-text="Tambah Obat" />
    
    <x-search-box placeholder="Cari berdasarkan nama obat..." />
    
    <x-data-table :headers="['ID', 'Nama Obat', 'Harga', 'Stok', 'Status', 'Aksi']">
        @forelse ($obat as $item)
            <x-table-row 
                :edit-route="route('master.obat.edit', $item)" 
                :delete-route="route('master.obat.destroy', $item)"
                delete-confirm="Hapus obat {{ $item->nama }}?">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8">
                            <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
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
                    <div class="text-sm font-medium text-green-600">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $item->stok }} unit</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($item->stok > 10)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            Tersedia
                        </span>
                    @elseif($item->stok > 0)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Stok Rendah
                        </span>
                    @else
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            Habis
                        </span>
                    @endif
                </td>
            </x-table-row>
        @empty
            <x-empty-state 
                message="Belum ada data obat" 
                description="Tambahkan obat untuk memulai inventori" />
        @endforelse
    </x-data-table>
    
    @if($obat->hasPages())
        <div class="mt-6">
            {{ $obat->links('components.pagination') }}
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeTableSearch();
});
</script>
@endsection
