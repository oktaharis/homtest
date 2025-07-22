@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
    <h2>Daftar Pembayaran</h2>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pasien</th>
                <th>Total Biaya</th>
                <th>Status</th>
                <th>Tanggal Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembayaran as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->kunjungan ? $item->kunjungan->pasien->nama : '-' }}</td>
                    <td>{{ number_format($item->total_biaya, 2) }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->tanggal_bayar ? \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') : '-' }}</td>
                    <td>
                        <a href="{{ route('pembayaran.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pembayaran.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pembayaran?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection