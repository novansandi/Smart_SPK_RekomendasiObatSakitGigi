
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SMART</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">SMART</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-6 pt-2">
                        <h3 class="card-title">Perhitungan SMART</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                @if($message=Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <div class="alert-text">{{ucwords($message)}}</div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" rowspan="2" style="vertical-align: middle">Ranking</th>
                                <th scope="col" rowspan="2" style="vertical-align: middle">Nama Obat</th>
                                @foreach ($listKriteria as $kriteria)
                                    <th scope="col" colspan="2">{{$kriteria["nama_kriteria"]}}</th>
                                @endforeach
                                <th scope="col" style="vertical-align: middle">Nilai Akhir</th>
                            </tr>
                            <tr class="text-center">
                                @foreach ($listKriteria as $kriteria)
                                    <th scope="col">Utility</th>
                                    <th scope="col">Bobot</th>
                                @endforeach
                                <th>∑(Utility x Bobot)</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($listObat as $index => $data)
                                <tr class="text-center">
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $data['kode_obat'] }}</td>
                                    @for($i = 0; $i < sizeof($listKriteria); $i++)
                                        <th scope="col">{{$arrData[$data['id']][$listKriteria[$i]['id']]}}</th>
                                        <th scope="col">{{$listKriteria[$i]['bobot'] / 100}}</th>
                                    @endfor
                                    <td>{{$data['nilai_akhir'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                    <div class="d-flex justify-content-end mt-3">
                        <nav aria-label="Page navigation example" style="cursor: pointer;">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link text-dark"
                                        wire:click="toPage({{ $page - 1 }})">Previous</a></li>
                                @for ($i = 1; $i <= $maxPage; $i++)
                                    <li class="page-item"><a class="page-link {{ $page == $i ? 'bg-dark text-light' : '' }}"
                                            wire:click="toPage({{ $i }})">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item"><a class="page-link text-dark" wire:click="toPage({{ $page + 1 }})">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
