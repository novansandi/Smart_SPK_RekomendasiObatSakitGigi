<?php

namespace App\Http\Livewire;

use App\Models\DetailObat;
use App\Models\Kriteria;
use App\Models\Obat;
use App\Models\Subkriteria;
use Livewire\Component;

class ObatComponent extends Component
{
    public $kode_obat, $subkriteria_id;
    public $listObat = [];
    public $listKriteria;
    public $search;

    //pagination
    public $page = 1, $limit = 20, $maxPage = 0;

    //save/edit
    public $mode = 'save';
    public $selected = [];
    public $errorMessage = '';

    public function mount()
    {
        $this->prepare();
    }

    public function prepare()
    {
        $this->listKriteria = Kriteria::where('is_deleted', '=', false)
            ->get()->toArray();
        foreach($this->listKriteria as &$kriteria){
            $kriteria["list_subkriteria"] = Subkriteria::where('is_deleted', '=', false)
                ->where('kriteria_id', '=', $kriteria['id'])
                ->get()->toArray();
        }
    }

    public function emptyForm()
    {
        $this->kode_obat = '';
        $this->subkriteria_id = [];
    }

    public function edit($index)
    {
        $this->selected = $this->listObat[$index];
        $this->subkriteria_id = $this->selected["subkriteria_id"];
        $this->mode = 'edit';
        $this->kode_obat = $this->selected["kode_obat"];
    }

    public function delete($index)
    {
        $this->selected = $this->listObat[$index];
        $this->mode = 'delete';
    }

    public function confirmDelete()
    {
        $obat = Obat::where('id', '=', $this->selected["id"])
            ->update(['is_deleted' => true]);
        if (!$obat) {
            $this->errorMessage = "gagal menghapus data obat!";
        }
    }

    public function create()
    {
        $this->mode = 'save';
        $this->emptyForm();
    }

    public function save()
    {
        switch ($this->mode) {
            case "save": {
                    $obat = Obat::create([
                        'kode_obat' => $this->kode_obat
                    ]);
                    if ($obat) {
                        foreach ($this->listKriteria as $index => $kriteria) {
                            $detail = DetailObat::create([
                                'obat_id' => $obat->id,
                                'kriteria_id' => $kriteria['id'],
                                'subkriteria_id' => $this->subkriteria_id[$index]
                            ]);
                        }
                    } else {
                        $this->errorMessage = 'gagal menambahkan data obat';
                        return;
                    }
                    break;
                }
            case "edit": {
                    $obat = Obat::where('id', $this->selected['id'])
                        ->update([
                            'kode_obat' => $this->kode_obat
                        ]);
                    if ($obat) {
                        foreach ($this->listKriteria as $index => $kriteria) {
                            $detail = DetailObat::where('obat_id', '=', $this->selected['id'])
                                ->where('kriteria_id', '=', $kriteria['id'])
                                ->update([
                                    'subkriteria_id' => $this->subkriteria_id[$index]
                                ]);
                        }
                    }
                    break;
                }
        }
        $this->emptyForm();
    }

    public function updateViewData()
    {
        $query = Obat::where('is_deleted', '=', false);

        $this->maxPage = ceil($query->count() / $this->limit);
        $this->listObat = $query->skip(($this->page - 1) * $this->limit)
            ->limit($this->limit)
            ->get()->toArray();

        foreach ($this->listObat as &$obat) {
            $detail = DetailObat::select('subkriteria_id', 'subkriterias.nama_subkriteria')
                ->join('kriterias', 'kriterias.id', '=', 'detail_obats.kriteria_id')
                ->join('subkriterias', 'subkriterias.id', '=', 'detail_obats.subkriteria_id', 'left outer')
                ->where('kriterias.is_deleted', '=', false)
                ->where('detail_obats.obat_id', '=', $obat['id'])
                ->orderBy('kriterias.id')
                ->get()->toArray();
            $obat["subkriteria_id"] = [];
            $obat["nama_subkriteria"] = [];
            foreach($detail as $index => $data){
                array_push($obat["subkriteria_id"], $data['subkriteria_id']);
                array_push($obat["nama_subkriteria"], $data["nama_subkriteria"]);
            }
        }
    }

    public function toPage($page)
    {
        if ($page < 1 || $page > $this->maxPage) return;
        $this->page = $page;
    }

    public function render()
    {
        $this->updateViewData();
        return view('livewire.obat-component')
            ->extends('templates.admin')
            ->section('slot');
    }
}
