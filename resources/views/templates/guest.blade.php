@extends('templates.app')


@section('content')
   <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="index.html" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>ReObSaGi</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="#home" class="nav-item nav-link ">Home</a>
                        <a href="#tentang" class="nav-item nav-link ">Tentang</a>
                        <a href="#hitungdosis" class="nav-item nav-link">Rekomendasi Obat</a>
                        <a href="#rekomendasi" class="nav-item nav-link">Hitung Dosis</a>
                        <a href="{{url('login')}}" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    
        @yield('slot')
   
@stop
