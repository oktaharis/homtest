@extends('layouts.app')

@section('title', 'Tindakan')

@section('content')
<div class="max-w-7xl mx-auto">
    <x-table-header 
        title="Data Tindakan Medis" 
        description="Kelola jenis tindakan dan tarif medis"
        :add-route="route('master.tindakan.create')" 
        add-text="Tambah Tindakan" />
    
    <x-search-box placeholder="Cari berdasarkan nama tindakan..." />
    
    <x-data-table :headers="['ID', 'Nama Tindakan', 'Biaya', 'Aksi']">
        @forelse ($tindakan as $item)
            <x-table-row 
                :edit-route="route('master.tindakan.edit', $item)" 
                :delete-route="route('master.tindakan.destroy', $item)"
                delete-confirm="Hapus tindakan {{ $item->nama }}?">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8">
                            <div class="h-8 w-8 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
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
                        Rp {{ number_format($item->biaya, 0, ',', '.') }}
                    </div>
                </td>
            </x-table-row>
        @empty
            <x-empty-state 
                message="Belum ada data tindakan" 
                description="Tambahkan tindakan medis untuk memulai" />
        @endforelse
    </x-data-table>
    
    @if($tindakan->hasPages())
        <div class="mt-6">
            {{ $tindakan->links('components.pagination') }}
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeTableSearch();
});
</script>
@endsection
