<div>
    @section('sectionName', 'Perhitungan SMART')
    <div class="d-flex justify-content-end mt-2">
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#kriteriaModal">
            Perankingan
        </button>
    </div>

    <div class="table-responsive">
        <table class="table mt-4">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">Ranking</th>
                    <th scope="col">Kode Obat</th>
                    <th scope="col">Nilai Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listObat as $index => $data)
                    <tr class="text-center">
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $data['kode_obat'] }}</td>
                        <td>{{ $data['nilai_akhir'] }}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Perankingan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Mulai perankingan data obat dengan menggunakan metode smart ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-dark" wire:click="smart()"
                        data-bs-dismiss="modal">Start</button>
                </div>
            </div>
        </div>
    </div>
</div>
