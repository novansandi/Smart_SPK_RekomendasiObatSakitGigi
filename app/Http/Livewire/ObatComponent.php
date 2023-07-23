<?php

namespace App\Http\Livewire;

use App\Models\DetailObat;
use App\Models\Kriteria;
use App\Models\Obat;
use App\Models\Subkriteria;
use Livewire\Component;

class ObatComponent extends Component
{
    public $kode_obat,$dosis_dewasa = 0, $subkriteria_id;
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
        $this->dosis_dewasa = $this->selected["dosis_dewasa"];
        //dd($this->selected);
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
                        'kode_obat' => $this->kode_obat,
                        'dosis_dewasa'=>$this->dosis_dewasa
                    ]);
                    if ($obat) {
                        foreach ($this->listKriteria as $index => $kriteria) {
                            $kriteriaData = Kriteria::where('id',$kriteria['id'])->first();
                            $subkriteriaData = Subkriteria::where('id',$this->subkriteria_id[$index])->first();
                            if($kriteriaData)
                            {
                                if($subkriteriaData)
                                {
                                    if($kriteriaData->type == 'benefit')
                                    {
                                        $detail = DetailObat::create([
                                            'obat_id' => $obat->id,
                                            'kriteria_id' => $kriteria['id'],
                                            'subkriteria_id' => $this->subkriteria_id[$index],
                                            'benefit'=>$subkriteriaData->nilai_subkriteria,
                                            'cost'=>0
                                        ]);
                                    }else
                                    {
                                        $detail = DetailObat::create([
                                            'obat_id' => $obat->id,
                                            'kriteria_id' => $kriteria['id'],
                                            'subkriteria_id' => $this->subkriteria_id[$index],
                                            'benefit'=>0,
                                            'cost'=>$subkriteriaData->nilai_subkriteria
                                        ]);
                                    }
                                }
                            }
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
                            'kode_obat' => $this->kode_obat,
                            'dosis_dewasa'=>$this->dosis_dewasa
                        ]);
                    if ($obat) {
                        foreach ($this->listKriteria as $index => $kriteria) {
                            $kriteriaData = Kriteria::where('id',$kriteria['id'])->first();
                            $subkriteriaData = Subkriteria::where('id',$this->subkriteria_id[$index])->first();
                            if($kriteriaData)
                            {
                                if($subkriteriaData)
                                {
                                    if($kriteriaData->type == 'benefit')
                                    {
                                        $detail = DetailObat::where('obat_id', '=', $this->selected['id'])
                                        ->where('kriteria_id', '=', $kriteria['id'])
                                        ->update([
                                            'subkriteria_id' => $this->subkriteria_id[$index],
                                            'cost'=>0,
                                            'benefit'=>$subkriteriaData->nilai_subkriteria
                                        ]);
                                    }else // cost
                                    {
                                        $detail = DetailObat::where('obat_id', '=', $this->selected['id'])
                                        ->where('kriteria_id', '=', $kriteria['id'])
                                        ->update([
                                            'subkriteria_id' => $this->subkriteria_id[$index],
                                            'cost'=>$subkriteriaData->nilai_subkriteria,
                                            'benefit'=>0
                                        ]);
                                    }
                                }
                            }
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
            $detail = DetailObat::select('subkriteria_id', 'subkriterias.nama_subkriteria','detail_obats.cost','detail_obats.benefit')
                ->join('kriterias', 'kriterias.id', '=', 'detail_obats.kriteria_id')
                ->join('subkriterias', 'subkriterias.id', '=', 'detail_obats.subkriteria_id', 'left outer')
                ->where('kriterias.is_deleted', '=', false)
                ->where('detail_obats.obat_id', '=', $obat['id'])
                ->orderBy('kriterias.id')
                ->get()->toArray();
            $obat["subkriteria_id"] = [];
            $obat["nama_subkriteria"] = [];
            $obat["value"] = [];
            foreach($detail as $index => $data){
                array_push($obat["subkriteria_id"], $data['subkriteria_id']);
                array_push($obat["nama_subkriteria"], $data["nama_subkriteria"]);
                if($data['cost'] == 0)
                {
                    array_push($obat["value"], $data["benefit"]);
                }else
                {
                    array_push($obat["value"], $data["cost"]);
                }
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
            ->extends('templates.new')
            ->section('content');
    }
}
