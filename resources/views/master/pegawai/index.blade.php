@extends('layouts.app')

@section('title', 'Pegawai')

@section('content')
    <h2>Daftar Pegawai</h2>
    <a href="{{ route('master.pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->user ? $item->user->username : '-' }}</td>
                    <td>
                        <a href="{{ route('master.pegawai.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('master.pegawai.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pegawai?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection