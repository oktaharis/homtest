@extends('layouts.app')

@section('title', 'Kunjungan')

@section('content')
    <h2>Daftar Kunjungan</h2>
    <a href="{{ route('transaksi.kunjungan.create') }}" class="btn btn-primary mb-3">Tambah Kunjungan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Tanggal Kunjungan</th>
                <th>Jenis Kunjungan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kunjungan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->pasien ? $item->pasien->nama : '-' }}</td>
                    <td>{{ $item->user ? $item->user->nama : '-' }}</td>
                    <td>{{ $item->tanggal_kunjungan }}</td>
                    <td>{{ $item->jenis_kunjungan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('transaksi.kunjungan.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('transaksi.kunjungan.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kunjungan?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection