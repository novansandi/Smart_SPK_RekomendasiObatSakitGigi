
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kriteria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Kriteria</a></li>
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
                        <h3 class="card-title">List Data Kriteria</h3>
                    </div>
                    <div class="col-sm-6" align="right">
                        <a data-toggle="modal" data-target="#kriteriaModal"
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
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Kriteria</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Bobot</th>
                                <th scope="col">Normalisasi Bobot</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listKriteria as $index => $kriteria)
                                <tr class="text-center">
                                    <th scope="row">{{ $index+1 }}</th>
                                    <th scope="row">{{ $kriteria['kode_kriteria'] }}</th>
                                    <td>{{ $kriteria['nama_kriteria'] }}</td>
                                    <td>{{ $kriteria['type'] }}</td>
                                    <td>{{ $kriteria['bobot'] }}</td>
                                    <td>{{ $rangeBobot > 0 ? ($kriteria['bobot'] - $minBobot) / $rangeBobot : '-' }}</td>
                                    <td class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-warning" style="margin-right: 15px"
                                            data-toggle="modal" data-target="#kriteriaModalEdit{{$kriteria['id']}}">
                                            Edit
                                        </button>
                                        <div class="modal fade" id="kriteriaModalEdit{{$kriteria['id']}}" tabindex="-1" aria-labelledby="kriteriaModalEdit{{$kriteria['id']}}" aria-hidden="true"
                                            wire:ignore.self data-backdrop="static">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                                                            Kriteria</h5>
                                                        <button type="button" data-dismiss="modal" aria-label="Close"
                                                            wire:click="emptyForm()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                    <form action="{{url('kriteria_update/'.$kriteria['id'])}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                                <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                    id="kode_kriteria">Kode Kriteria</button>
                                                                <input required type="text" name="kode_kriteria" class="form-control" placeholder="Masukkan kode kriteria" 
                                                                value="{{$kriteria['kode_kriteria']}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                    id="nama_kriteria">Nama Kriteria</button>
                                                                <input required type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria" value="{{$kriteria['nama_kriteria']}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                    id="bobot">Bobot</button>
                                                                <input required type="number" name="bobot" step="0.01" class="form-control" placeholder="bobot" value="{{$kriteria['bobot']}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                    id="type">Type</button>
                                                                <select required class="form-control" id="inputGroupSelect02" name="type" wire:model="type">
                                                                    <option>Type ...</option>
                                                                        <option value="cost" 
                                                                        {{$kriteria['type'] == 'cost'?'selected':''}}>
                                                                            Cost
                                                                        </option>
                                                                        <option value="benefit"
                                                                        {{$kriteria['type'] == 'benefit'?'selected':''}}>
                                                                            Benefit
                                                                        </option>
                                                                </select>
                                                            </div>
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
                                            data-target="#kriteriaModalDelete{{$kriteria['id']}}">
                                            Delete
                                        </button>
                                        <div class="modal fade" id="kriteriaModalDelete{{$kriteria['id']}}" tabindex="-1" 
                                             aria-labelledby="kriteriaModalDelete{{$kriteria['id']}}" aria-hidden="true"
                                            wire:ignore.self data-backdrop="static">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kriteria</h5>
                                                        <button type="button"  data-dismiss="modal" aria-label="Close"
                                                            wire:click="emptyForm()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       Apakah Anda Yakin Untuk Hapus data kriteria {{$kriteria['nama_kriteria']}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{url('kriteria_delete/'.$kriteria['id'])}}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot >
                            <tr class="text-center">
                                <td colspan="3">
                                    Jumlah
                                </td>
                                <td>{{$rangeBobot}}</td>
                                <td colspan="2"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>


                <div class="modal fade" id="kriteriaModal" tabindex="-1" aria-labelledby="kriteriaModal" aria-hidden="true"
                        wire:ignore.self data-backdrop="static">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data
                                        Kriteria</h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                        wire:click="emptyForm()"><i class="fa fa-close"></i></button>
                                </div>
                                <form action="{{url('kriteria_store')}}" method="POST">
                                    @csrf
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                            id="kode_kriteria">Kode Kriteria</button>
                                        <input required type="text" name="kode_kriteria" class="form-control" placeholder="Masukkan kode kriteria"
                                            >
                                    </div>
                                    <div class="input-group mb-3">
                                        <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                            id="nama_kriteria">Nama Kriteria</button>
                                        <input required type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                            id="bobot">Bobot</button>
                                        <input required type="number" name="bobot" step="0.01" class="form-control" placeholder="bobot"
                                            >
                                    </div>
                                    <div class="input-group mb-3">
                                        <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                            id="type">Type</button>
                                        <select required class="form-control" id="inputGroupSelect02" name="type" wire:model="type">
                                            <option value="">Type ...</option>
                                                <option value="cost">Cost</option>
                                                <option value="benefit">Benefit</option>
                                        </select>
                                    </div>
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
