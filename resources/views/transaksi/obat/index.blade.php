@extends('layouts.app')

@section('title', 'Transaksi Obat')

@section('content')
<div class="max-w-7xl mx-auto">
    <x-table-header 
        title="Transaksi Obat" 
        description="Kelola resep dan pemberian obat kepada pasien"
        :add-route="route('transaksi.obat.create')" 
        add-text="Tambah Resep" />
    
    <x-search-box placeholder="Cari berdasarkan nama pasien atau obat..." />
    
    <x-data-table :headers="['ID', 'Kunjungan', 'Obat', 'Jumlah', 'Total Harga', 'Catatan', 'Aksi']">
        @forelse ($transaksiObat as $item)
            <x-table-row 
                :edit-route="route('transaksi.obat.edit', $item)" 
                :delete-route="route('transaksi.obat.destroy', $item)"
                delete-confirm="Hapus transaksi obat ini?">
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
                    @if($item->kunjungan)
                        <div class="text-sm">
                            <div class="font-medium text-gray-900">{{ $item->kunjungan->pasien->nama }}</div>
                            <div class="text-gray-500">{{ \Carbon\Carbon::parse($item->kunjungan->tanggal_kunjungan)->format('d/m/Y H:i') }}</div>
                        </div>
                    @else
                        <span class="text-sm text-gray-400">-</span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">
                        {{ $item->obat ? $item->obat->nama : '-' }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $item->jumlah }} unit</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-green-600">
                        @if($item->obat)
                            Rp {{ number_format($item->obat->harga * $item->jumlah, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm text-gray-900 max-w-xs truncate" title="{{ $item->catatan }}">
                        {{ $item->catatan ?? '-' }}
                    </div>
                </td>
            </x-table-row>
        @empty
            <x-empty-state 
                message="Belum ada transaksi obat" 
                description="Tambahkan resep obat untuk pasien" />
        @endforelse
    </x-data-table>
    
    @if($transaksiObat->hasPages())
        <div class="mt-6">
            {{ $transaksiObat->links('components.pagination') }}
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeTableSearch();
});
</script>
@endsection
