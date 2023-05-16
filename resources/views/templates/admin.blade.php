@extends('templates.app')


@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nv" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nv" href="/kriteria">Kriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nv" href="/subkriteria">Subkriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nv" href="/obat">Data Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nv" href="/smart">Perhitungan SMART</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <div class="container mt-4">
        <h3>@yield('sectionName', 'Dashboard')</h3>
        <hr style="background-color: #777">
        @yield('slot')
    </div>
@stop
