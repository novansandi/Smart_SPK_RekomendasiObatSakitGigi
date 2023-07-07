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
    public $listKriteria;

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
            $detail = DetailObat::select('detail_obats.id', 'subkriterias.nilai_subkriteria', 'detail_obats.cost', 'detail_obats.benefit')
                ->where('detail_obats.obat_id', '=', $obat['id'])
                ->join('kriterias', 'kriterias.id', '=', 'detail_obats.kriteria_id')
                ->join('subkriterias', 'subkriterias.id', '=', 'detail_obats.subkriteria_id', 'left outer')
                ->orderBy('detail_obats.kriteria_id', 'asc')
                ->get()->toArray();
            $obat["matrix"] = array_column($detail, 'nilai_subkriteria');
            $obat["nilai_akhir"] = 0;
            foreach ($listKriteria as $index => &$kriteria) {
                $detail[$index]["cost"] = ($kriteria["max_sub"] - $obat["matrix"][$index]) / ($kriteria["max_sub"] - $kriteria["min_sub"]);
                $detail[$index]["benefit"] = ($obat["matrix"][$index] - $kriteria["min_sub"]) / ($kriteria["max_sub"] - $kriteria["min_sub"]);
                if ($kriteria["type"] == "benefit") {
                    $obat["matrix"][$index] = $detail[$index]["benefit"] * ($kriteria["normalisasi_bobot"]);
                } else {
                    $obat["matrix"][$index] = $detail[$index]["cost"] * ($kriteria["normalisasi_bobot"]);
                }
                $obat["nilai_akhir"] += $obat["matrix"][$index];
                DetailObat::where("id", '=', $detail[$index]["id"])
                    ->update([
                        "cost" => $detail[$index]["cost"],
                        "benefit" => $detail[$index]["benefit"]
                    ]);
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
        $this->listKriteria = Kriteria::orderBy("id")->get()->toArray();

        $sumBobot = Kriteria::selectRaw('sum(bobot) as sum')
            ->where('is_deleted', '=', false)->get()->toArray();
        if ($sumBobot) $sumBobot = $sumBobot[0]['sum'];
        else $sumBobot = 1; 

        foreach ($this->listKriteria as &$kriteria) {
            $subkriteria = Subkriteria::where('is_deleted', '=', false)
                ->where('kriteria_id', '=', $kriteria['id'])
                ->orderBy('nilai_subkriteria', 'desc')
                ->get()->toArray();
            $kriteria['max_sub'] = $subkriteria[0]['nilai_subkriteria'];
            $kriteria['min_sub'] = $subkriteria[sizeof($subkriteria) - 1]['nilai_subkriteria'];
            $kriteria['normalisasi_bobot'] = $kriteria['bobot'] / $sumBobot;
        }

        $this->listObat = $query->orderBy('nilai_akhir', 'desc')
            ->orderBy('id', 'asc')
            ->skip(($this->page - 1) * $this->limit)
            ->limit($this->limit)
            ->get()->toArray();

        foreach ($this->listObat as &$obat) {
            $detail = DetailObat::where("obat_id", $obat["id"])
                ->orderBy("kriteria_id", 'asc')
                ->get()->toArray();
            $obat["cost"] = array_column($detail, "cost");
            $obat["benefit"] = array_column($detail, "benefit");
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
        return view('livewire.smart-component')
            ->extends('templates.admin')
            ->section('slot');
    }
}
