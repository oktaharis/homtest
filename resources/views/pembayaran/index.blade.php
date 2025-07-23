@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
<div class="max-w-7xl mx-auto">
    <x-table-header 
        title="Data Pembayaran" 
        description="Kelola pembayaran dan tagihan pasien"
        :add-route="route('pembayaran.create')" 
        add-text="Tambah Pembayaran" />
    
    <x-search-box placeholder="Cari berdasarkan nama pasien atau status..." />
    
    <x-data-table :headers="['ID', 'Pasien', 'Total Biaya', 'Status', 'Tanggal Bayar', 'Aksi']">
        @forelse ($pembayaran as $item)
            <x-table-row 
                :edit-route="route('pembayaran.edit', $item)" 
                :delete-route="route('pembayaran.destroy', $item)"
                delete-confirm="Hapus data pembayaran ini?">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8">
                            <div class="h-8 w-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">#{{ $item->id }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-6 w-6">
                            <div class="h-6 w-6 rounded-full bg-pink-100 flex items-center justify-center">
                                <span class="text-xs font-medium text-pink-700">
                                    {{ $item->kunjungan && $item->kunjungan->pasien ? substr($item->kunjungan->pasien->nama, 0, 1) : '?' }}
                                </span>
                            </div>
                        </div>
                        <div class="ml-2">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $item->kunjungan && $item->kunjungan->pasien ? $item->kunjungan->pasien->nama : '-' }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-bold text-green-600">
                        Rp {{ number_format($item->total_biaya, 0, ',', '.') }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $item->status === 'lunas' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $item->status === 'lunas' ? 'Lunas' : 'Belum Bayar' }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ $item->tanggal_bayar ? \Carbon\Carbon::parse($item->tanggal_bayar)->format('d/m/Y') : '-' }}
                    </div>
                </td>
            </x-table-row>
        @empty
            <x-empty-state 
                message="Belum ada data pembayaran" 
                description="Tambahkan pembayaran untuk memulai" />
        @endforelse
    </x-data-table>
    
    @if($pembayaran->hasPages())
        <div class="mt-6">
            {{ $pembayaran->links('components.pagination') }}
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeTableSearch();
});
</script>
@endsection
