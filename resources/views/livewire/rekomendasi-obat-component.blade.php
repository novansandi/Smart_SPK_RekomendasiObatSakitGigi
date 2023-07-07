<div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 ">
            <div class="input-group mb-3 d-flex justify-content-center">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelectbentuk">Bentuk</label>
                </div>
                <select class="custom-select" id="inputGroupSelectbentuk" style="min-width: 150px" wire:model="filter.bentuk">
                    <option selected>Choose...</option>
                    @foreach ($listBentuk as $bentuk)
                        <option value="{{$bentuk["id"]}}">{{$bentuk['nama_subkriteria']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 ">
            <div class="input-group mb-3 d-flex justify-content-center">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelectharga">Harga</label>
                </div>
                <select class="custom-select" id="inputGroupSelectharga" style="min-width: 150px" wire:model="filter.harga">
                    <option selected>Choose...</option>
                    @foreach ($listHarga as $harga)
                        <option value="{{$harga["id"]}}">{{$harga["nama_subkriteria"]}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 ">
            <div class="input-group mb-3 d-flex justify-content-center">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelectusia">Usia</label>
                </div>
                <select class="custom-select" id="inputGroupSelectusia" style="min-width: 150px" wire:model="filter.usia">
                    <option selected>Choose...</option>
                    @foreach ($listUsia as $usia)
                        <option value="{{$usia["id"]}}">{{$usia["nama_subkriteria"]}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 d-flex justify-content-center mb-3">
            <div class="btn btn-dark" wire:click="rekom()">
                Rekomendasi
            </div>
        </div>
    </div>
    <hr>

    <div class="table-responsive">
        <table class="table mt-4">
            <thead class="table-dark">
                <tr class="text-center">
                    <th style="max-width: 10px;">No</th>
                    <th scope="col">Kode Obat</th>
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
