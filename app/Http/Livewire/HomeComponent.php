<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Kriteria;
use App\Models\Obat;
use App\Models\Subkriteria;
use Illuminate\Support\Facades\DB;
class HomeComponent extends Component
{
    public $listBentuk = [];

    public $listHarga =  [];

    public $listUsia = [];

    public $bentukId = 0;
    public $hargaId = 0;
    public $usiaId = 0;

    public $filter = [
        "bentuk" => 14,
        "harga" => 10,
        "usia" => 18
    ];

    public $listObat = [];

    public $usia;
    public $usiaPerhitungan;
    public $dosis;
    public $errMessage;
    public $data = [];
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
        $obat = DB::table('obats as obt')
                ->where('obt.is_deleted',0)
                ->get();
        $temp = [];
        foreach ($obat as $key => $value) 
        {
             $bentuk = DB::table('detail_obats')->where('obat_id',$value->id)->where('kriteria_id',4)->first();
             $harga = DB::table('detail_obats')->where('obat_id',$value->id)->where('kriteria_id',3)->first();
             $usia = DB::table('detail_obats')->where('obat_id',$value->id)->where('kriteria_id',5)->first();
             if($bentuk && $harga && $usia)
             {
                if($bentuk->subkriteria_id == $this->filter['bentuk'] && $harga->subkriteria_id == $this->filter['harga'] && $usia->subkriteria_id == $this->filter['usia'])
                {
                    array_push($temp, $value->id);      
                }
             }
        }

        $temp = array_unique($temp);
        $this->listObat = DB::table('obats')->whereIn('id',$temp)->get();
        $this->listObat = json_decode(json_encode($this->listObat),true);
    }

    public function hitungDosis()
    {
        $dataObat = DB::table('obats')->where('is_deleted',0)->orderBy('nilai_akhir','DESC')->get();
        foreach ($dataObat as $key => $value) 
        {
            $dosisObatData = $value->dosis_dewasa;
            $this->data[$key]['kode_obat'] = $value->kode_obat;
            $this->data[$key]['dosis'] = $value->takaran_per_hari.' Kali Sehari Atau '.$dosisObatData.' mg/hari';
        }
    }

    public function render()
    {
        $this->hitungDosis();
        return view('livewire.home-component')
            ->extends('templates.guest')
            ->section('slot');
    }
}
