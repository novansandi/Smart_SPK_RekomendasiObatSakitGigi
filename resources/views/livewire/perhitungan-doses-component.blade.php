<div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 ">
            <div class="input-group mb-3 d-flex justify-content-center">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Usia</span>
                </div>
                <input type="number" class="form-control" placeholder="usia" aria-label="usia"
                    aria-describedby="basic-addon1" wire:model="usia">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start">
            <div class="btn btn-dark mb-3" wire:click="hitungDosis()">
                Hitung dosis
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h4>Perhitungan Dosis</h4>
        <hr>
        @if ($errMessage)
        <div class="alert alert-danger" role="alert">
            {{$errMessage}}
          </div>
        @endif
        @if ($usiaPerhitungan && $dosis > 0)
            <p>Berdasarkan perhitungan {{$usiaPerhitungan > 8 ? 'diling' : "young"}}, dosis maksimum untuk usia {{$usiaPerhitungan}} tahun adalah {{$dosis}} mg</p>
        @else
            Masukkan usia anda untuk mendapatkan perhitungan dosis!
        @endif
    </div>
</div>
