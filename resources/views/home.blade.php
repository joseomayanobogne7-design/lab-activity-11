@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Hero / Profile Section -->
    <div class="row align-items-center mb-5 p-5 rounded shadow-lg bg-secondary text-white">
        <div class="col-md-4 text-center mb-4 mb-md-0">
            <!-- Ginamit ang ibinigay mong direktang link ng larawan -->
            <img src="https://img.sanishtech.com/u/87a49bfce169224e524b6d808466cc1e.jpg" alt="Mj Obogne" class="rounded-circle img-fluid border border-4 border-light shadow" style="width: 180px; height: 180px; object-fit: cover;">
        </div>
        <div class="col-md-8">
            <h1 class="display-4 fw-bold text-warning mb-2">Welcome to Library App</h1>
            <h3 class="fw-semibold text-light">Mj Obogne</h3>
            <p class="lead text-light mb-3">BSIT (Bachelor of Science in Information Technology)</p>
            <p class="text-light opacity-75">Isang maganda at modernong web application para sa pamamahala ng mga aklat, genre, at mga aktibidad sa ating sistema.</p>
            <a href="{{ route('books.index') }}" class="btn btn-warning btn-lg fw-bold text-dark mt-2 shadow-sm">View Book List</a>
        </div>
    </div>

    <!-- Dashboard Statistics (Live Counts) -->
    <div class="row text-center">
        <div class="col-md-6 mb-4">
            <div class="card bg-dark text-white border-info shadow h-100 py-3">
                <div class="card-body">
                    <h5 class="card-title text-uppercase text-info fw-bold mb-3">Total Books</h5>
                    <p class="display-3 fw-bold text-white mb-0">{{ $bookCount ?? 20 }}</p>
                    <small class="text-muted">Aktibong nakatala sa database</small>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card bg-dark text-white border-success shadow h-100 py-3">
                <div class="card-body">
                    <h5 class="card-title text-uppercase text-success fw-bold mb-3">Total Genres</h5>
                    <p class="display-3 fw-bold text-white mb-0">{{ $genreCount ?? 5 }}</p>
                    <small class="text-muted">Uri ng mga kategorya</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection