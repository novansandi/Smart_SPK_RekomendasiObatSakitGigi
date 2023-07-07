<?php

namespace App\Http\Livewire;

use App\Models\Kriteria;
use App\Models\Obat;
use App\Models\Subkriteria;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RekomendasiObatComponent extends Component
{
    public $listBentuk = [];

    public $listHarga =  [];

    public $listUsia = [];

    public $bentukId = 0;
    public $hargaId = 0;
    public $usiaId = 0;

    public $filter = [
        "bentuk" => "",
        "harga" => "",
        "usia" => ""
    ];

    public $listObat = [];

    public function mount()
    {
        $this->bentukId = Kriteria::where("kriterias.nama_kriteria", '=', "bentuk")->get()->toArray();
        $this->hargaId = Kriteria::where("kriterias.nama_kriteria", '=', "harga")->get()->toArray();
        $this->usiaId = Kriteria::where("kriterias.nama_kriteria", '=', "usia")->get()->toArray();

        if ($this->bentukId && $this->hargaId && $this->usiaId) {
            $this->bentukId = $this->bentukId[0]["id"];
            $this->hargaId = $this->hargaId[0]["id"];
            $this->usiaId = $this->usiaId[0]["id"];

            $this->listBentuk = Subkriteria::select("nama_subkriteria", "id", "kriteria_id")
                ->where("kriteria_id", "=", $this->bentukId)->get()->toArray();

            $this->listHarga = Subkriteria::select("nama_subkriteria", "id", "kriteria_id")
                ->where("kriteria_id", "=", $this->hargaId)->get()->toArray();

            $this->listUsia = Subkriteria::select("nama_subkriteria", "id", "kriteria_id")
                ->where("kriteria_id", "=", $this->usiaId)->get()->toArray();
        }
    }


    public function rekom()
    {
        $this->listObat = Obat::select("*")
            ->whereRaw("
            exists (
                select 1 from `detail_obats`
                    where `detail_obats`.`subkriteria_id` = ".$this->filter["bentuk"]."
                    and `detail_obats`.`kriteria_id` = $this->bentukId
                    and `detail_obats`.`obat_id` = obats.id)
            and exists (
                select 1 from `detail_obats`
                    where `detail_obats`.`subkriteria_id` = ".$this->filter["harga"]."
                    and `detail_obats`.`kriteria_id` = $this->hargaId
                    and `detail_obats`.`obat_id` = obats.id)
            and exists (
                select 1 from `detail_obats`
                    where `detail_obats`.`subkriteria_id` = ".$this->filter["usia"]."
                    and `detail_obats`.`kriteria_id` = $this->usiaId
                    and `detail_obats`.`obat_id` = obats.id)"
            )->orderBy('nilai_akhir', 'desc')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.rekomendasi-obat-component')
            ->extends('templates.guest')
            ->section('slot');
    }
}
