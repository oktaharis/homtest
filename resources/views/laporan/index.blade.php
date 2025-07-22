@extends('layouts.app')

@section('title', 'Laporan Klinik')

@section('content')
    <h2>Laporan Klinik</h2>
    <form method="GET" action="{{ route('laporan.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">Tanggal Akhir</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-4 align-self-end">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </form>

    <!-- Laporan Kunjungan -->
    <h3>Jumlah Kunjungan Pasien</h3>
    <table class="table table-bordered mb-4">
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
    <canvas id="kunjunganChart" style="max-height: 400px; margin-bottom: 40px;"></canvas>

    <!-- Laporan Tindakan -->
    <h3>Jenis Tindakan Terbanyak</h3>
    <table class="table table-bordered mb-4">
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
    <canvas id="tindakanChart" style="max-height: 400px; margin-bottom: 40px;"></canvas>

    <!-- Laporan Obat -->
    <h3>Obat Paling Sering Diresepkan</h3>
    <table class="table table-bordered mb-4">
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
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    // Grafik Kunjungan (Bar Chart)
    const kunjunganCtx = document.getElementById('kunjunganChart').getContext('2d');
    const kunjunganLabels = {!! json_encode($kunjungan->pluck('tanggal')->map(function ($tgl) {
        return \Carbon\Carbon::parse($tgl)->format('d-m-Y');
    })) !!};
    const kunjunganData = {!! json_encode($kunjungan->pluck('jumlah')) !!};

    new Chart(kunjunganCtx, {
        type: 'bar',
        data: {
            labels: kunjunganLabels,
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: kunjunganData,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Grafik Tindakan (Pie Chart)
    const tindakanCtx = document.getElementById('tindakanChart').getContext('2d');
    const tindakanLabels = {!! json_encode($tindakan->pluck('nama')) !!};
    const tindakanData = {!! json_encode($tindakan->pluck('jumlah')) !!};

    new Chart(tindakanCtx, {
        type: 'pie',
        data: {
            labels: tindakanLabels,
            datasets: [{
                label: 'Jumlah Tindakan',
                data: tindakanData,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(153, 102, 255, 0.5)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });

    // Grafik Obat (Pie Chart)
    const obatCtx = document.getElementById('obatChart').getContext('2d');
    const obatLabels = {!! json_encode($obat->pluck('nama')) !!};
    const obatData = {!! json_encode($obat->pluck('jumlah')) !!};

    new Chart(obatCtx, {
        type: 'pie',
        data: {
            labels: obatLabels,
            datasets: [{
                label: 'Jumlah Obat',
                data: obatData,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(153, 102, 255, 0.5)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
@endsection