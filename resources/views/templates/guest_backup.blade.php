@extends('templates.app')


@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end" style="width: 100%">
                    <li class="nav-item">
                        <a class="nav-link nv" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nv" href="/rekom-obat">Rekomendasi Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nv" href="/perhitungan-dosis">Perhitungan Dosis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nv" href="/login">Login</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <div class="container mt-5">
        @yield('slot')
    </div>
@stop
