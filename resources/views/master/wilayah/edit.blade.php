@extends('layouts.app')

@section('title', 'Edit Wilayah')

@section('content')
    <h2>Edit Wilayah</h2>
    <form method="POST" action="{{ route('master.wilayah.update', $wilayah) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $wilayah->nama) }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select name="tipe" id="tipe" class="form-control" required>
                <option value="provinsi" {{ old('tipe', $wilayah->tipe) === 'provinsi' ? 'selected' : '' }}>Provinsi</option>
                <option value="kabupaten" {{ old('tipe', $wilayah->tipe) === 'kabupaten' ? 'selected' : '' }}>Kabupaten</option>
            </select>
            @error('tipe')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent (Provinsi)</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">Tidak ada</option>
                @foreach ($provinsi as $prov)
                    <option value="{{ $prov->id }}" {{ old('parent_id', $wilayah->parent_id) == $prov->id ? 'selected' : '' }}>{{ $prov->nama }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('master.wilayah.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection