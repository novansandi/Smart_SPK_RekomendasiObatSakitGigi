
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SubKriteria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">SubKriteria</a></li>
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
                        <h3 class="card-title">List Data SubKriteria</h3>
                    </div>
                    <div class="col-sm-6" align="right">
                        <a data-toggle="modal" data-target="#subkriteriaModal"
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
                                <th scope="col">Kriteria</th>
                                <th scope="col">Subkriteria</th>
                                <th scope="col">Nilai</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSubkriteria as $index => $subkriteria)
                                <tr class="text-center">
                                    <th scope="row">{{ $index+1 }}</th>
                                    <th scope="row">{{ $subkriteria['nama_kriteria'] }}</th>
                                    <td>{{ $subkriteria['nama_subkriteria'] }}</td>
                                    <td>{{ $subkriteria['nilai_subkriteria'] }}</td>
                                    <td class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-warning" style="margin-right: 15px"
                                            data-toggle="modal" data-target="#subkriteriaModalEdit{{$subkriteria['id']}}">
                                            Edit
                                        </button>
                                        <div class="modal fade" id="subkriteriaModalEdit{{$subkriteria['id']}}" tabindex="-1" aria-labelledby="subkriteriaModalEdit{{$subkriteria['id']}}" aria-hidden="true"
                                            wire:ignore.self data-backdrop="static">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                                                            SubKriteria</h5>
                                                        <button type="button" data-dismiss="modal" aria-label="Close"
                                                            wire:click="emptyForm()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                    <form action="{{url('subkriteria_update/'.$subkriteria['id'])}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                                <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                    id="nama_subkriteria">Nama SubKriteria</button>
                                                                <input required type="text" name="nama_subkriteria" class="form-control" placeholder="Nama SubKriteria" value="{{$subkriteria['nama_subkriteria']}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                    id="kode_subkriteria">Nilai SubKriteria</button>
                                                                <input required type="number" step="1"  name="nilai_subkriteria" class="form-control" placeholder="Masukkan Nilai"
                                                                    value="{{$subkriteria['nilai_subkriteria']}}">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                                                    id="type">Kriteria</button>
                                                                <select required class="form-control" id="inputGroupSelect02" name="kriteria_id" wire:model="type">
                                                                    <option value="">Pilih ...</option>
                                                                         @foreach ($listKriteria as $data)
                                                                            <option value="{{ $data['id'] }}"
                                                                            {{$subkriteria['kriteria_id'] == $data['id']?'selected':''}}>
                                                                                {{ $data['nama_kriteria'] }}
                                                                            </option>
                                                                        @endforeach
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
                                            data-target="#subkriteriaModalDelete{{$subkriteria['id']}}">
                                            Delete
                                        </button>
                                        <div class="modal fade" id="subkriteriaModalDelete{{$subkriteria['id']}}" tabindex="-1" 
                                             aria-labelledby="subkriteriaModalDelete{{$subkriteria['id']}}" aria-hidden="true"
                                            wire:ignore.self data-backdrop="static">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data SubKriteria</h5>
                                                        <button type="button"  data-dismiss="modal" aria-label="Close"
                                                            wire:click="emptyForm()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       Apakah Anda Yakin Untuk Hapus data subkriteria {{$subkriteria['nama_subkriteria']}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{url('subkriteria_delete/'.$subkriteria['id'])}}" class="btn btn-danger">Delete</a>
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


                <div class="modal fade" id="subkriteriaModal" tabindex="-1" aria-labelledby="subkriteriaModal" aria-hidden="true"
                        wire:ignore.self data-backdrop="static">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data
                                        SubKriteria</h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                        wire:click="emptyForm()"><i class="fa fa-close"></i></button>
                                </div>
                                <form action="{{url('subkriteria_store')}}" method="POST">
                                    @csrf
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                            id="nama_subkriteria">Nama SubKriteria</button>
                                        <input required type="text" name="nama_subkriteria" class="form-control" placeholder="Nama SubKriteria" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                            id="kode_subkriteria">Nilai SubKriteria</button>
                                        <input required type="number" step="1"  name="nilai_subkriteria" class="form-control" placeholder="Masukkan Nilai"
                                            >
                                    </div>
                                    <div class="input-group mb-3">
                                        <button style="min-width: 122px;" class="btn btn-primary" disabled type="button"
                                            id="type">Kriteria</button>
                                        <select required class="form-control" id="inputGroupSelect02" name="kriteria_id" wire:model="type">
                                            <option value="">Pilih ...</option>
                                                 @foreach ($listKriteria as $data)
                                                    <option value="{{ $data['id'] }}">
                                                        {{ $data['nama_kriteria'] }}
                                                    </option>
                                                @endforeach
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
