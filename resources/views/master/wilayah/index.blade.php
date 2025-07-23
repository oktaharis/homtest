@extends('layouts.app')

@section('title', 'Wilayah')

@section('content')
<div class="max-w-7xl mx-auto">
    <x-table-header 
        title="Data Wilayah" 
        description="Kelola data provinsi dan kabupaten"
        :add-route="route('master.wilayah.create')" 
        add-text="Tambah Wilayah" />
    
    <x-search-box placeholder="Cari berdasarkan nama wilayah atau tipe..." />
    
    <x-data-table :headers="['ID', 'Nama Wilayah', 'Tipe', 'Parent', 'Aksi']">
        @forelse ($wilayah as $item)
            <x-table-row 
                :edit-route="route('master.wilayah.edit', $item->id)" 
                {{-- delete-route="route('master.wilayah.destroy', $item)" --}}
                {{-- delete-confirm="Hapus wilayah {{ $item->nama }}?" --}}
                >
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8">
                            <div class="h-8 w-8 rounded-full bg-emerald-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
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
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $item->tipe === 'provinsi' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                        {{ ucfirst($item->tipe) }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ $item->parent ? $item->parent->nama : '-' }}
                    </div>
                </td>
            </x-table-row>
        @empty
            <x-empty-state 
                message="Belum ada data wilayah" 
                description="Tambahkan provinsi atau kabupaten untuk memulai" />
        @endforelse
    </x-data-table>
    
    @if($wilayah->hasPages())
        <div class="mt-6">
            {{ $wilayah->links('components.pagination') }}
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeTableSearch();
});
</script>
@endsection
