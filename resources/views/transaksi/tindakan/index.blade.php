@extends('layouts.app')

@section('title', 'Transaksi Tindakan')

@section('content')
    <h2>Daftar Transaksi Tindakan</h2>
    <a href="{{ route('transaksi.tindakan.create') }}" class="btn btn-primary mb-3">Tambah Transaksi Tindakan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kunjungan</th>
                <th>Tindakan</th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksiTindakan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->kunjungan ? $item->kunjungan->pasien->nama : '-' }}</td>
                    <td>{{ $item->tindakan ? $item->tindakan->nama : '-' }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->catatan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('transaksi.tindakan.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('transaksi.tindakan.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus transaksi tindakan?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection