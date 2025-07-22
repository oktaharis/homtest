<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik App - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Klinik App</a>
            <div class="navbar-nav">
                @auth
                    @php
                        $role = auth()->user()->role;
                    @endphp
                    @switch($role)
                        @case('admin')
                            <a class="nav-link" href="{{ route('master.users.index') }}">Users</a>
                            <a class="nav-link" href="{{ route('master.wilayah.index') }}">Wilayah</a>
                            <a class="nav-link" href="{{ route('master.pegawai.index') }}">Pegawai</a>
                            <a class="nav-link" href="{{ route('master.pasien.index') }}">Pasien</a>
                            <a class="nav-link" href="{{ route('master.tindakan.index') }}">Tindakan</a>
                            <a class="nav-link" href="{{ route('master.obat.index') }}">Obat</a>
                            <a class="nav-link" href="{{ route('laporan.index') }}">Laporan</a>
                        @break

                        @case('petugas')
                            <a class="nav-link" href="{{ route('master.pasien.index') }}">Pasien</a>
                            <a class="nav-link" href="{{ route('transaksi.kunjungan.index') }}">Kunjungan</a>
                        @break

                        @case('dokter')
                            <a class="nav-link" href="{{ route('transaksi.kunjungan.index') }}">Kunjungan</a>
                            <a class="nav-link" href="{{ route('transaksi.tindakan.index') }}">Transaksi Tindakan</a>
                            <a class="nav-link" href="{{ route('transaksi.obat.index') }}">Transaksi Obat</a>
                        @break

                        @case('kasir')
                            <a class="nav-link" href="{{ route('pembayaran.index') }}">Pembayaran</a>
                            <a class="nav-link" href="{{ route('laporan.index') }}">Laporan</a>
                        @break
                    @endswitch
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn">Logout</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @yield('script')
</body>

</html>
