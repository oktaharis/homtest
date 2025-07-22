@extends('layouts.app')

@section('title', 'Tindakan')

@section('content')
    <h2>Daftar Tindakan</h2>
    <a href="{{ route('master.tindakan.create') }}" class="btn btn-primary mb-3">Tambah Tindakan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Biaya</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tindakan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ number_format($item->biaya, 2) }}</td>
                    <td>
                        <a href="{{ route('master.tindakan.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('master.tindakan.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus tindakan?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection