@extends('layouts.app')

@section('title', 'Pasien')

@section('content')
    <h2>Daftar Pasien</h2>
    <a href="{{ route('master.pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Wilayah</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->wilayah ? $item->wilayah->nama : '-' }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>
                        <a href="{{ route('master.pasien.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('master.pasien.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pasien?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection