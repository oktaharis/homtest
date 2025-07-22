@extends('layouts.app')

@section('title', 'Laporan Obat')

@section('content')
    <h2>Laporan Obat</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Jumlah</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($obat as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ number_format($item->total_biaya, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data obat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <canvas id="obatChart" style="max-height: 400px;"></canvas>
    <script>
        // Placeholder untuk Chart.js
        // Anda bisa menambahkan logika Chart.js di sini
    </script>
@endsection