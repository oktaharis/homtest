@extends('layouts.app')

@section('title', 'Laporan Tindakan')

@section('content')
    <h2>Laporan Tindakan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Tindakan</th>
                <th>Jumlah</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tindakan as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ number_format($item->total_biaya, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data tindakan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <canvas id="tindakanChart" style="max-height: 400px;"></canvas>
    <script>
        // Placeholder untuk Chart.js
        // Anda bisa menambahkan logika Chart.js di sini
    </script>
@endsection