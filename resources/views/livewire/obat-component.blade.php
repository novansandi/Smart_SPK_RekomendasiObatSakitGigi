<div>
    @section('sectionName', 'Data Obat')
    <div class="d-flex justify-content-end mt-2">
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#kriteriaModal"
            wire:click="create()">
            Tambah Data
        </button>
    </div>

    <div class="table-responsive">
        <table class="table mt-4">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Dosis Dewasa</th>
                    @foreach ($listKriteria as $kriteria)
                        <th scope="col">{{ $kriteria['nama_kriteria'] }}</th>
                    @endforeach
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listObat as $index => $data)
                    <tr class="text-center">
                        <th scope="row">{{ $data['kode_obat'] }}</th>
                        <th scope="row">{{ $data['dosis_dewasa'] }}</th>
                        @foreach ($listKriteria as $index2 => $kriteria)
                            <td scope="col">
                                {{ $data['nama_subkriteria'][$index2] }}
                            </td>
                        @endforeach
                        <td class="d-flex justify-content-end">
                            <button type="button" class="btn btn-warning" style="margin-right: 15px"
                                data-bs-toggle="modal" data-bs-target="#kriteriaModal"
                                wire:click="edit({{ $index }})">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#kriteriaModalDelete" wire:click="delete({{ $index }})">
                                Delete
                            </button>
                        </td>
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

    <div class="modal fade" id="kriteriaModal" tabindex="-1" aria-labelledby="kriteriaModal" aria-hidden="true"
        wire:ignore.self data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $mode == 'save' ? 'Tambah' : 'Edit' }} Data
                        Obat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="emptyForm()"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <button style="min-width: 122px;" class="btn btn-dark" disabled type="button"
                            id="nama_kriteria">Kode Obat</button>
                        <input type="text" class="form-control" placeholder="Kode Obat" wire:model="kode_obat">
                    </div>
                    <div class="input-group mb-3">
                        <button style="min-width: 122px;" class="btn btn-dark" disabled type="button"
                            id="dosis_dewasa">Dosis Dewasa</button>
                        <input type="text" class="form-control" placeholder="Dosis Dewasa" wire:model="dosis_dewasa">
                    </div>
                    @foreach ($listKriteria as $index => $kriteria)
                        <div class="input-group mb-3">
                            <button style="min-width: 122px;" class="btn btn-dark" disabled type="button"
                                id="kode_kriteria">{{$kriteria['nama_kriteria']}}</button>
                            <select class="form-select" id="inputGroupSelect02" wire:model="subkriteria_id.{{$index}}">
                                <option>Pilih Subkriteria ...</option>
                                @foreach ($kriteria['list_subkriteria'] as $data)
                                    <option value="{{ $data['id'] }}" 
                                     >
                                        {{ $data['nama_subkriteria'] }} 
                                    </option>
                                
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>
                @if ($kode_obat && $subkriteria_id && sizeof($subkriteria_id) == sizeof($listKriteria))
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click="emptyForm()">Close</button>
                        <button type="button" class="btn btn-dark" wire:click="save()"
                            data-bs-dismiss="modal">Save</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="kriteriaModalDelete" tabindex="-1" aria-labelledby="kriteriaModalDelete"
        aria-hidden="true" wire:ignore.self data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="emptyForm()"></button>
                </div>
                <div class="modal-body">
                    Hapus data Subkriteria {{ $selected['kode_obat'] ?? '' }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="confirmDelete()"
                        data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
