<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PerhitunganDosesComponent extends Component
{
    public $usia;
    public $usiaPerhitungan;
    public $dosis;
    public $errMessage;

    public function mount(){
        $this->dosis = 0;
    }

    public function hitungDosis(){
        $this->usiaPerhitungan = $this->usia;
        if($this->usia <= 8 && $this->usia > 0){
            //perhitungan young
            $this->dosis = number_format(($this->usia / ($this->usia + 12)) * 500, 2);
            $this->errMessage = "";
        }else if($this->usia > 8) {
            //perhitungan diling
            $this->dosis = number_format(($this->usia / 20) * 1500, 2);
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
