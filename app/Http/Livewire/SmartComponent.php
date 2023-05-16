<?php

namespace App\Http\Livewire;

use App\Models\DetailObat;
use App\Models\Kriteria;
use App\Models\Obat;
use App\Models\Subkriteria;
use Livewire\Component;

class SmartComponent extends Component
{
    public $listObat = [];

    //paggination
    public $page = 1, $limit = 20, $maxPage = 0;

    public function mount()
    {
    }


    public function smart()
    {
        //normalisasi
        $listKriteria = Kriteria::where('is_deleted', '=', false)
            ->orderBy('id', 'asc')
            ->get()->toArray();

        $sumBobot = Kriteria::selectRaw('sum(bobot) as sum')
            ->where('is_deleted', '=', false)->get()->toArray();
        if ($sumBobot) $sumBobot = $sumBobot[0]['sum'];

        foreach ($listKriteria as &$kriteria) {
            $subkriteria = Subkriteria::where('is_deleted', '=', false)
                ->where('kriteria_id', '=', $kriteria['id'])
                ->orderBy('nilai_subkriteria', 'desc')
                ->get()->toArray();
            $kriteria['max_sub'] = $subkriteria[0]['nilai_subkriteria'];
            $kriteria['min_sub'] = $subkriteria[sizeof($subkriteria) - 1]['nilai_subkriteria'];
            $kriteria['normalisasi_bobot'] = $kriteria['bobot'] / $sumBobot;
        }
        $data = Obat::where('is_deleted', '=', false)->get()->toArray();
        foreach ($data as &$obat) {
            $detail = DetailObat::select('subkriterias.nilai_subkriteria')
                ->where('detail_obats.obat_id', '=', $obat['id'])
                ->join('kriterias', 'kriterias.id', '=', 'detail_obats.kriteria_id')
                ->join('subkriterias', 'subkriterias.id', '=', 'detail_obats.subkriteria_id', 'left outer')
                ->orderBy('detail_obats.kriteria_id', 'asc')
                ->get()->toArray();
            $obat["matrix"] = array_column($detail, 'nilai_subkriteria');
            $obat["nilai_akhir"] = 0;
            foreach ($listKriteria as $index => &$kriteria) {
                $obat["matrix"][$index] = ($obat["matrix"][$index] - $kriteria["min_sub"]) * $kriteria['normalisasi_bobot'] / ($kriteria["max_sub"] - $kriteria['min_sub']);
                $obat["nilai_akhir"] += $obat["matrix"][$index];
            }
            Obat::where('id', '=', $obat["id"])
                ->update([
                    'nilai_akhir' => $obat["nilai_akhir"]
                ]);
        }
    }

    public function updateViewData()
    {
        $query = Obat::where('is_deleted', '=', false);

        $this->maxPage = ceil($query->count() / $this->limit);
        $this->listObat = $query->orderBy('nilai_akhir', 'desc')
            ->orderBy('id', 'asc')
            ->skip(($this->page - 1) * $this->limit)
            ->limit($this->limit)
            ->get()->toArray();
    }

    public function toPage($page)
    {
        if ($page < 1 || $page > $this->maxPage) return;
        $this->page = $page;
    }
    public function render()
    {
        $this->updateViewData();
        return view('livewire.smart-component')
            ->extends('templates.admin')
            ->section('slot');
    }
}
