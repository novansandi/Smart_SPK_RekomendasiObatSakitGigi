    <div>
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header" id="home">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">Welcome To Sistem Rekom Obat</h5>
                    <h1 class="display-1 text-white mb-md-4">Sistem Informasi Rekomendasi Obat Sakit Gigi</h1>
                    <div class="pt-2">
                        <a href="#hitungdosis" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Rekomendasi Obat</a>
                        <a href="#rekomendasi" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Rekomendasi Dosis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5" id="tentang">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/sakit.webp" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Tentang Sistem</h5>
                        <h1 class="display-4">Sistem Rekomendasi Obat Sakit Gigi</h1>
                    </div>
                    <p>Sistem rekomendasi obat sakit gigi adalah sebuah solusi inovatif yang didesain untuk membantu masyarakat dalam mengatasi keluhan sakit gigi dengan cepat dan efektif. Dengan memanfaatkan teknologi canggih berbasis kecerdasan buatan.</p>

                    <p>Sistem rekomendasi obat sakit gigi akan memberikan saran obat-obatan yang paling sesuai dengan kebutuhan pengguna. Pengguna juga dapat mengungkapkan preferensi pribadi, seperti memilih obat kaplet, tablet, kapsul atau cair, sehingga rekomendasi yang diberikan dapat lebih disesuaikan dengan kebutuhan individual.</p>

                    <p>Sistem ini tidak hanya memberikan rekomendasi obat, tetapi juga memberikan informasi lengkap mengenai dosis yang dianjurkan, interaksi obat, dan peringatan potensial terkait efek samping. Dengan demikian, pengguna dapat merasa lebih percaya diri dan aman dalam mengambil keputusan terkait perawatan kesehatan gigi mereka.</p>

                    <p>Dengan dukungan teknologi mutakhir dan basis data yang terus diperbarui, sistem rekomendasi obat sakit gigi berfungsi sebagai mitra kesehatan yang handal bagi para pasien, membantu mereka meredakan rasa sakit dan kembali menikmati kualitas hidup yang optimal</p>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    

    <!-- Search Start -->
    <div class="container-fluid bg-primary py-5" id="rekomendasi">
        <div class="container py-5">
            <div class="text-center mx-auto mb-3" style="max-width: 500px;">
                <h5 class="d-inline-block  text-uppercase border-bottom border-5">Dosis Obat</h5>
            </div>
            <p align="center" style="color: white;">
                dosis yang tertera hanya kisaran jumlah secara umum, beri tahu dokter jika anda ingin tahu dosis secara tepat sesuai penyakit yang anda keluhkan
                <br>bawa ke dokter bila anda mempunyai alergi obat atau riwayat penyakit
            </p>
              <div class="table-responsive" align="center"> 
                <table class="table mt-4" style="color: white;text-align: center;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Dosis Maksimal/Hari</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item['kode_obat']}}</td>
                            <td>{{$item['dosis']}}</td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
    <!-- Search End -->

        <!-- Search Start -->

    <div class="container-fluid  py-5" id="hitungdosis">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block  text-uppercase border-bottom border-5">Rekomendasi Obat</h5>
                <h5 class="fw-normal">Pilih sesuai kriteria anda</h5>
            </div>
            <div class="mx-auto" style="width: 100%; max-width: 100%;">
                <div class="row">
                    <div class="col-md-3">
                        <select class="form-control" id="inputGroupSelectbentuk" style="min-width: 150px;background-color: white;" wire:model="filter.bentuk">
                        <option selected disabled>Pilih Bentuk</option>
                        @foreach ($listBentuk as $bentuk)
                            <option value="{{$bentuk["id"]}}">{{$bentuk['nama_subkriteria']}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" id="inputGroupSelectharga" style="min-width: 150px;background-color: white;" wire:model="filter.harga">
                            <option selected disabled>Pilih Harga</option>
                            @foreach ($listHarga as $harga)
                                <option value="{{$harga["id"]}}">{{$harga["nama_subkriteria"]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" id="inputGroupSelectusia" style="min-width: 150px;background-color: white;" wire:model="filter.usia">
                            <option selected disabled>Pilih Usia</option>
                            @foreach ($listUsia as $usia)
                                <option value="{{$usia["id"]}}">{{$usia["nama_subkriteria"]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                         <select class="form-control" id="inputGroupSelectKeluhan" style="min-width: 150px;background-color: white;" wire:model="filter.keluhan">
                            <option selected disabled>Pilih Usia</option>
                            @foreach ($listKeluhan as $keluhan)
                                <option value="{{$keluhan["id"]}}">{{$keluhan["nama"]}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="row pt-4">
                    <div class="col-md-12" align="center">
                        <button class="btn btn-dark border-0" wire:click="rekom()">Temukan <i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            @if(count($listObat) > 0)
            <div class="table-responsive">
                <table class="table mt-4">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th style="max-width: 10px;">No</th>
                            <th scope="col">Nama Obat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listObat as $index => $data)
                            <tr class="text-center">
                                <th>{{$index + 1}}</th>
                                <th scope="row">{{ $data['kode_obat'] }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
    <!-- Search End -->
    </div>

    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">{{date('Y')}} &copy; <a class="text-primary" href="#">{{ config('app.name') }}</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-primary" href="{{url('/')}}"></a>{{ config('app.name') }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->





