@extends('layouts.app')

@section('title', 'Edit Tindakan')

@section('content')
    <h2>Edit Tindakan</h2>
    <form method="POST" action="{{ route('master.tindakan.update', $tindakan) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $tindakan->nama) }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="biaya" class="form-label">Biaya</label>
            <input type="number" name="biaya" id="biaya" class="form-control" value="{{ old('biaya', $tindakan->biaya) }}" required>
            @error('biaya')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('master.tindakan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection