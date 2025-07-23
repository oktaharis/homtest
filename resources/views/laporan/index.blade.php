@extends('layouts.app')

@section('title', 'Laporan Klinik')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <h2 class="text-2xl font-bold text-gray-900">Laporan Klinik</h2>

    <!-- Form Filter -->
    <form method="GET" action="{{ route('laporan.index') }}" class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
            </div>
            <div class="flex items-end space-x-3">
                <button type="submit" class="w-full px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                    Filter
                </button>
                <a href="{{ route('laporan.index') }}" class="w-full px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Reset
                </a>
            </div>
        </div>
    </form>

    <!-- Laporan Kunjungan -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Jumlah Kunjungan Pasien</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Kunjungan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($kunjungan as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->jumlah }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Tidak ada data kunjungan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <canvas id="kunjunganChart" class="mt-6" style="max-height: 400px;"></canvas>
    </div>

    <!-- Laporan Tindakan -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Jenis Tindakan Terbanyak</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Tindakan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Biaya</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($tindakan as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->jumlah }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($item->total_biaya, 2, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Tidak ada data tindakan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <canvas id="tindakanChart" class="mt-6" style="max-height: 400px;"></canvas>
    </div>

    <!-- Laporan Obat -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Obat Paling Sering Diresepkan</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Obat</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Biaya</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($obat as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->jumlah }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($item->total_biaya, 2, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Tidak ada data obat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <canvas id="obatChart" class="mt-6" style="max-height: 400px;"></canvas>
    </div>
</div>
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
                backgroundColor: 'rgba(59, 130, 246, 0.5)', // primary-500
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 12,
                            family: 'Inter, sans-serif'
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        display: false
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
                    'rgba(59, 130, 246, 0.5)',  // primary-500
                    'rgba(239, 68, 68, 0.5)',   // red-500
                    'rgba(16, 185, 129, 0.5)',  // emerald-500
                    'rgba(245, 158, 11, 0.5)',  // amber-500
                    'rgba(139, 92, 246, 0.5)'   // violet-500
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(239, 68, 68, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(245, 158, 11, 1)',
                    'rgba(139, 92, 246, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 12,
                            family: 'Inter, sans-serif'
                        }
                    }
                }
            }
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
                    'rgba(59, 130, 246, 0.5)',  // primary-500
                    'rgba(239, 68, 68, 0.5)',   // red-500
                    'rgba(16, 185, 129, 0.5)',  // emerald-500
                    'rgba(245, 158, 11, 0.5)',  // amber-500
                    'rgba(139, 92, 246, 0.5)'   // violet-500
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(239, 68, 68, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(245, 158, 11, 1)',
                    'rgba(139, 92, 246, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 12,
                            family: 'Inter, sans-serif'
                        }
                    }
                }
            }
        }
    });
</script>
@endsection