@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Selamat Datang di Aplikasi Klinik</h1>
    <p>Silakan login untuk mengakses fitur sesuai hak akses Anda.</p>
    @if (!auth()->check())
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    @endif
@endsection