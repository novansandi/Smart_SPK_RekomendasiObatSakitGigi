<div>
    @section('sectionName', 'Kriteria')
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
                        <th scope="row">{{ $kriteria['kode_kriteria'] }}</th>
                        <td>{{ $kriteria['nama_kriteria'] }}</td>
                        <td>{{ $kriteria['type'] }}</td>
                        <td>{{ $kriteria['bobot'] }}</td>
                        <td>{{ $rangeBobot > 0 ? ($kriteria['bobot'] - $minBobot) / $rangeBobot : '-' }}</td>
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
            <tfoot class="table-dark">
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

    <div class="d-flex justify-content-end mt-3">
        <nav aria-label="Page navigation example" style="cursor: pointer;">
            <ul class="pagination">
                <li class="page-item"><a class="page-link text-dark"  wire:click="toPage({{$page - 1}})">Previous</a></li>
                @for ($i = 1; $i <= $maxPage; $i++)
                    <li class="page-item"><a class="page-link {{$page == $i ? 'bg-dark text-light' : ''}}" wire:click="toPage({{$i}})">{{$i}}</a></li>
                @endfor
                <li class="page-item"><a class="page-link text-dark" wire:click="toPage({{$page + 1}})">Next</a></li>
            </ul>
        </nav>
    </div>

    <div class="modal fade" id="kriteriaModal" tabindex="-1" aria-labelledby="kriteriaModal" aria-hidden="true"
        wire:ignore.self data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $mode == 'save' ? 'Tambah' : 'Edit' }} Data
                        Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="emptyForm()"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <button style="min-width: 122px;" class="btn btn-dark" disabled type="button"
                            id="kode_kriteria">Kode Kriteria</button>
                        <input type="text" class="form-control" placeholder="Masukkan kode kriteria"
                            wire:model="kode">
                    </div>
                    <div class="input-group mb-3">
                        <button style="min-width: 122px;" class="btn btn-dark" disabled type="button"
                            id="nama_kriteria">Nama Kriteria</button>
                        <input type="text" class="form-control" placeholder="Nama Kriteria" wire:model="nama">
                    </div>
                    <div class="input-group mb-3">
                        <button style="min-width: 122px;" class="btn btn-dark" disabled type="button"
                            id="bobot">Bobot</button>
                        <input type="number" step="0.01" class="form-control" placeholder="bobot"
                            wire:model="bobot">
                    </div>
                    <div class="input-group mb-3">
                        <button style="min-width: 122px;" class="btn btn-dark" disabled type="button"
                            id="type">Type</button>
                        <select class="form-select" id="inputGroupSelect02" wire:model="type">
                            <option>Type ...</option>
                                <option value="cost">Cost</option>
                                <option value="benefit">Benefit</option>
                        </select>
                    </div>
                </div>
                @if ($kode && $nama && $bobot)
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
    <div class="modal fade" id="kriteriaModalDelete" tabindex="-1" aria-labelledby="kriteriaModalDelete" aria-hidden="true"
        wire:ignore.self data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="emptyForm()"></button>
                </div>
                <div class="modal-body">
                    Hapus data kriteria {{ $selected['nama_kriteria'] ?? '' }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-dark" wire:click="confirmDelete()"
                        data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
