<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
class PerhitunganDosesComponent extends Component
{
    public $usia;
    public $usiaPerhitungan;
    public $dosis;
    public $errMessage;
    public $data = [];
    public function mount(){
        $this->dosis = 0;
    }

    public function hitungDosis(){
        $this->usiaPerhitungan = $this->usia;
        if($this->usia < 8 && $this->usia > 0){
            //perhitungan young // validasi dari dokter 
            $this->dosis = 0;
            $this->errMessage = "Minimal usia diperuntukan untuk 8 tahun keatas!";
        }else if($this->usia >= 8) {
            //perhitungan diling
            $dosisData = number_format(($this->usia / 12) * 1500, 2);
            $this->dosis = $dosisData;
            $dataObat = DB::table('obats')->where('is_deleted',0)->orderBy('nilai_akhir','DESC')->get();
            foreach ($dataObat as $key => $value) 
            {
                $dosisObatData = number_format(($this->usia / 12) * $value->dosis_dewasa, 2);
                $this->data[$key]['kode_obat'] = $value->kode_obat;
                $this->data[$key]['dosis'] = $dosisObatData;
            }
            $this->errMessage = "";
        }else{
            $this->dosis = 0;
            $this->errMessage = "usia tidak valid!";
        }
    }
    public function render()
    {
        return view('livewire.perhitungan-doses-component')
            ->extends('templates.guest')
            ->section('slot');
    }
}
