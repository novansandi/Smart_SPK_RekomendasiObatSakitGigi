
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Obat</a></li>
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
                        <h3 class="card-title">List Data Obat</h3>
                    </div>
                    <div class="col-sm-6" align="right">
                        <a data-toggle="modal" data-target="#obatModal"
                            wire:click="create()" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
                    <table class="table table-bordered table-striped" id="example1">
                        <thead >
                            <tr class="text-center">
                                <th scope="col">Nama Obat</th>
                                <th scope="col">Dosis Dewasa</th>
                                <th scope="col">Takaran/Hari</th>
                                @foreach ($listKriteria as $kriteria)
                                    <th scope="col">{{ $kriteria['nama_kriteria'] }}</th>
                                @endforeach
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listObat as $index => $obat)
                                <tr class="text-center">
                                    <th scope="row">{{ $obat['kode_obat'] }}</th>
                                    <th scope="row">{{ $obat['dosis_dewasa'] }}</th>
                                    <th scope="row">{{ $obat['takaran_per_hari'] }}</th>
                                    @foreach ($listKriteria as $index2 => $kriteria)
                                        <td scope="col">
                                            {{ $obat['nama_subkriteria'][$index2] }}
                                        </td>
                                    @endforeach
                                    <td class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-warning" style="margin-right: 15px"
                                            data-toggle="modal" data-target="#obatModalEdit{{$obat['id']}}">
                                            Edit
                                        </button>
                                        <div class="modal fade" id="obatModalEdit{{$obat['id']}}" tabindex="-1" aria-labelledby="obatModalEdit{{$obat['id']}}" aria-hidden="true"
                                            wire:ignore.self data-backdrop="static">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                                                            Obat</h5>
                                                        <button type="button" data-dismiss="modal" aria-label="Close"
                                                            wire:click="emptyForm()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                    <form action="{{url('obat_update/'.$obat['id'])}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                                <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                    id="nama_obat">Kode Obat</button>
                                                                <input required type="text" name="kode_obat" class="form-control" placeholder="Kode Obat" value="{{$obat['kode_obat']}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                    id="kode_obat">Dosis Dewasa</button>
                                                                <input required type="number" step="any"  name="dosis_dewasa" class="form-control" placeholder="15000" value="{{$obat['dosis_dewasa']}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                    id="kode_obat">Takaran/Hari</button>
                                                                <input required type="number" step="any"  name="takaran_per_hari" class="form-control" placeholder="3" value="{{$obat['takaran_per_hari']}}">
                                                            </div>
                                                            @foreach ($listKriteria as $index => $kriteria)
                                                                <div class="input-group mb-3">
                                                                    <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                        id="kode_kriteria" >{{$kriteria['nama_kriteria']}}</button>
                                                                    <select required class="form-control" name="subkriteria_id[{{$index}}]">
                                                                        <option value="">Pilih Subkriteria ...</option>
                                                                        @foreach ($kriteria['list_subkriteria'] as $data)
                                                                            <option value="{{ $data['id'] }}"
                                                                            {{$obat['subkriteria_id'][$index] == $data['id'] ? 'selected':''}}>
                                                                                {{ $data['nama_subkriteria'] }} 
                                                                            </option>
                                                                        
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                                    >Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                    >Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#obatModalDelete{{$obat['id']}}">
                                            Delete
                                        </button>
                                        <div class="modal fade" id="obatModalDelete{{$obat['id']}}" tabindex="-1" 
                                             aria-labelledby="obatModalDelete{{$obat['id']}}" aria-hidden="true"
                                            wire:ignore.self data-backdrop="static">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Obat</h5>
                                                        <button type="button"  data-dismiss="modal" aria-label="Close"
                                                            wire:click="emptyForm()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       Apakah Anda Yakin Untuk Hapus data obat {{$obat['kode_obat']}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{url('obat_delete/'.$obat['id'])}}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="modal fade" id="obatModal" tabindex="-1" aria-labelledby="obatModal" aria-hidden="true"
                        wire:ignore.self data-backdrop="static">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data
                                        Obat</h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                        wire:click="emptyForm()"><i class="fa fa-close"></i></button>
                                </div>
                                <form action="{{url('obat_store')}}" method="POST">
                                    @csrf
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                            id="nama_obat">Kode Obat</button>
                                        <input required type="text" name="kode_obat" class="form-control" placeholder="Kode Obat" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                            id="kode_obat">Dosis Dewasa</button>
                                        <input required type="number" step="any"  name="dosis_dewasa" class="form-control" placeholder="15000">
                                    </div>
                                    <div class="input-group mb-3">
                                        <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                id="kode_obat">Takaran/Hari</button>
                                        <input required type="number" step="any"  name="takaran_per_hari" class="form-control" placeholder="3" >
                                    </div>
                                    @foreach ($listKriteria as $index => $kriteria)
                                        <div class="input-group mb-3">
                                            <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                id="kode_kriteria" >{{$kriteria['nama_kriteria']}}</button>
                                            <select required class="form-control" name="subkriteria_id[{{$index}}]">
                                                <option value="">Pilih Subkriteria ...</option>
                                                @foreach ($kriteria['list_subkriteria'] as $data)
                                                    <option value="{{ $data['id'] }}">
                                                        {{ $data['nama_subkriteria'] }} 
                                                    </option>
                                                
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            >Close</button>
                                    <button type="submit" class="btn btn-primary"
                                            >Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                

                </div>
            </div>
        </div>
    </div>
    </section>
</div>
