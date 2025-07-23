@extends('layouts.app')

@section('title', 'Transaksi Tindakan')

@section('content')
<div class="max-w-7xl mx-auto">
    <x-table-header 
        title="Transaksi Tindakan Medis" 
        description="Kelola tindakan medis yang diberikan kepada pasien"
        :add-route="route('transaksi.tindakan.create')" 
        add-text="Tambah Transaksi" />
    
    <x-search-box placeholder="Cari berdasarkan nama pasien atau tindakan..." />
    
    <x-data-table :headers="['ID', 'Kunjungan', 'Tindakan', 'Jumlah', 'Total Biaya', 'Catatan', 'Aksi']">
        @forelse ($transaksiTindakan as $item)
            <x-table-row 
                :edit-route="route('transaksi.tindakan.edit', $item)" 
                :delete-route="route('transaksi.tindakan.destroy', $item)"
                delete-confirm="Hapus transaksi tindakan ini?">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8">
                            <div class="h-8 w-8 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
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
                            <div class="text-gray-500">{{ \Carbon\Carbon::parse($item->kunjungan->tanggal_kunjungan)->format('d/m/Y') }}</div>
                        </div>
                    @else
                        <span class="text-sm text-gray-400">-</span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">
                        {{ $item->tindakan ? $item->tindakan->nama : '-' }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $item->jumlah }}x</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-green-600">
                        @if($item->tindakan)
                            Rp {{ number_format($item->tindakan->biaya * $item->jumlah, 0, ',', '.') }}
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
                message="Belum ada transaksi tindakan" 
                description="Tambahkan tindakan medis untuk pasien" />
        @endforelse
    </x-data-table>
    
    @if($transaksiTindakan->hasPages())
        <div class="mt-6">
            {{ $transaksiTindakan->links('components.pagination') }}
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeTableSearch();
});
</script>
@endsection
