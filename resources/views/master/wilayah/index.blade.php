@extends('layouts.app')

@section('title', 'Wilayah')

@section('content')
    <h2>Daftar Wilayah</h2>
    <a href="{{ route('master.wilayah.create') }}" class="btn btn-primary mb-3">Tambah Wilayah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Parent</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wilayah as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tipe }}</td>
                    <td>{{ $item->parent ? $item->parent->nama : '-' }}</td>
                    <td>
                        <a href="{{ route('master.wilayah.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('master.wilayah.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus wilayah?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection