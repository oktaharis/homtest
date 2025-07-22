@extends('layouts.app')

@section('title', 'Obat')

@section('content')
    <h2>Daftar Obat</h2>
    <a href="{{ route('master.obat.create') }}" class="btn btn-primary mb-3">Tambah Obat</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ number_format($item->harga, 2) }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <a href="{{ route('master.obat.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('master.obat.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus obat?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection