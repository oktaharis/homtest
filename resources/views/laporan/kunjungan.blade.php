@extends('layouts.app')

@section('title', 'Laporan Kunjungan')

@section('content')
    <h2>Laporan Kunjungan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah Kunjungan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kunjungan as $item)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $item->jumlah }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">Tidak ada data kunjungan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <canvas id="kunjunganChart" style="max-height: 400px;"></canvas>
    <script>
        // Placeholder untuk Chart.js
        // Anda bisa menambahkan logika Chart.js di sini
    </script>
@endsection