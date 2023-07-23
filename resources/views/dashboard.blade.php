@extends('templates.new')
@section('content')
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-medkit"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Obat</span>
                <span class="info-box-number">
                  {{$obat}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-list"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Kriteria</span>
                <span class="info-box-number">
                  {{$kriteria}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-list-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Subkriteria</span>
                <span class="info-box-number">
                  {{$subkriteria}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="text-align: center;">
                <p align="center" class="pt-4" style="margin-bottom: 0;">
                    Selamat Datang Di Sistem Informasi Rekomendasi Obat Sakit Gigi (ReobSagi)
                </p>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">

                  <div class="col-md-12">
                    <p class="">
                      Sistem rekomendasi obat sakit gigi adalah sebuah solusi inovatif yang didesain untuk membantu masyarakat dalam mengatasi keluhan sakit gigi dengan cepat dan efektif. Dengan memanfaatkan teknologi canggih berbasis kecerdasan buatan.
                    </p>
                    <p class="">
                      Sistem rekomendasi obat sakit gigi akan memberikan saran obat-obatan yang paling sesuai dengan kebutuhan pengguna. Pengguna juga dapat mengungkapkan preferensi pribadi, seperti memilih obat kaplet, tablet, kapsul atau cair, sehingga rekomendasi yang diberikan dapat lebih disesuaikan dengan kebutuhan individual.
                    </p>
                     <p>Sistem ini tidak hanya memberikan rekomendasi obat, tetapi juga memberikan informasi lengkap mengenai dosis yang dianjurkan, interaksi obat, dan peringatan potensial terkait efek samping. Dengan demikian, pengguna dapat merasa lebih percaya diri dan aman dalam mengambil keputusan terkait perawatan kesehatan gigi mereka.</p>

                    <p>Dengan dukungan teknologi mutakhir dan basis data yang terus diperbarui, sistem rekomendasi obat sakit gigi berfungsi sebagai mitra kesehatan yang handal bagi para pasien, membantu mereka meredakan rasa sakit dan kembali menikmati kualitas hidup yang optimal</p>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

