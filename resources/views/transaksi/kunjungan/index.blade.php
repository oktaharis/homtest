@extends('layouts.app')

@section('title', 'Kunjungan')

@section('content')
<div class="max-w-7xl mx-auto">
    <x-table-header 
        title="Data Kunjungan Pasien" 
        description="Kelola kunjungan dan jadwal pasien"
        :add-route="route('transaksi.kunjungan.create')" 
        add-text="Tambah Kunjungan" />
    
    <x-search-box placeholder="Cari berdasarkan nama pasien atau dokter..." />
    
    <x-data-table :headers="['ID', 'Pasien', 'Dokter', 'Tanggal Kunjungan', 'Jenis', 'Status', 'Aksi']">
        @forelse ($kunjungan as $item)
        {{-- {{ dd($item) }} --}}
            <x-table-row 
                :edit-route="route('transaksi.kunjungan.edit', $item)" 
                :delete-route="route('transaksi.kunjungan.destroy', $item)"
                delete-confirm="Hapus kunjungan ini?">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8">
                            <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m6-10v10m-6-4h6"></path>
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
                                    {{ $item->pasien ? substr($item->pasien->nama, 0, 1) : '?' }}
                                </span>
                            </div>
                        </div>
                        <div class="ml-2">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $item->pasien ? $item->pasien->nama : '-' }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ $item->user ? $item->user->nama : '-' }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('d/m/Y H:i') }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $item->jenis_kunjungan === 'rawat_jalan' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                        {{ ucfirst(str_replace('_', ' ', $item->jenis_kunjungan)) }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                        @switch($item->status)
                            @case('pendaftaran') bg-yellow-100 text-yellow-800 @break
                            @case('selesai') bg-green-100 text-green-800 @break
                            @case('dibayar') bg-blue-100 text-blue-800 @break
                            @default bg-gray-100 text-gray-800
                        @endswitch">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
            </x-table-row>
        @empty
            <x-empty-state 
                message="Belum ada kunjungan" 
                description="Tambahkan kunjungan pasien untuk memulai" />
        @endforelse
    </x-data-table>
    
    @if($kunjungan->hasPages())
        <div class="mt-6">
            {{ $kunjungan->links('components.pagination') }}
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeTableSearch();
});
</script>
@endsection
