@extends('layouts.app')

@section('title', 'Transaksi Obat')

@section('content')
    <h2>Daftar Transaksi Obat</h2>
    <a href="{{ route('transaksi.obat.create') }}" class="btn btn-primary mb-3">Tambah Transaksi Obat</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kunjungan</th>
                <th>Obat</th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksiObat as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->kunjungan ? $item->kunjungan->pasien->nama . ' (' . \Carbon\Carbon::parse($item->kunjungan->tanggal_kunjungan)->format('d-m-Y H:i') . ')' : '-' }}</td>
                    <td>{{ $item->obat ? $item->obat->nama : '-' }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->catatan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('transaksi.obat.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('transaksi.obat.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus transaksi obat?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data transaksi obat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection