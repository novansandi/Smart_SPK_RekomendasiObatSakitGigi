<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SmartComponent extends Component
{
    
    public function render()
    {
        return view('livewire.smart-component')
            ->extends('templates.admin')
            ->section('slot');
    }
}
