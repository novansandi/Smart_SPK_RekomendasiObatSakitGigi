<?php

namespace App\Http\Livewire;

use App\Models\Kriteria;
use Livewire\Component;

class KriteriaComponent extends Component
{
    public $kode, $nama, $bobot, $type;
    public $listKriteria;
    public $search;

    //pagination
    public $page = 1, $limit = 20, $maxPage = 0;
    public $maxBobot = 0;
    public $minBobot = 0;
    public $rangeBobot = 0;

    //save/edit
    public $mode = 'save';
    public $selected = [];
    public $errorMessage = '';

    public function mount()
    {
        $this->updateViewData();
    }

    public function emptyForm()
    {
        $this->kode = $this->nama = $this->bobot = $this->errorMessage =  '';
    }

    public function isValid()
    {
        return !$this->kode && !$this->nama && !$this->bobot;
    }

    public function edit($index)
    {
        $this->selected = $this->listKriteria[$index];
        $this->nama = $this->selected["nama_kriteria"];
        $this->kode = $this->selected["kode_kriteria"];
        $this->bobot = $this->selected["bobot"];
        $this->type = $this->selected["type"];
        $this->mode = 'edit';
    }

    public function delete($index)
    {
        $this->selected = $this->listKriteria[$index];
        $this->mode = 'delete';
        $this->updateMinMax();
    }

    public function confirmDelete()
    {
        $kriteria = Kriteria::where('id', '=', $this->selected["id"])
            ->update(['is_deleted' => true]);

        if (!$kriteria) {
            $this->errorMessage = 'gagal menghapus data kriteria!';
            return;
        }
        $this->updateViewData();
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
                    $kriteria = Kriteria::create([
                        'kode_kriteria' => $this->kode,
                        'nama_kriteria' => $this->nama,
                        'bobot' => $this->bobot,
                        "type" => $this->type,
                    ]);

                    if (!$kriteria) {
                        $this->errorMessage = "gagal menambahkan data kriteria!";
                        return;
                    }
                    break;
                }
            case "edit": {
                    $kriteria = Kriteria::where('id', $this->selected["id"])
                        ->update([
                            'kode_kriteria' => $this->kode,
                            'nama_kriteria' => $this->nama,
                            'bobot' => $this->bobot,
                            "type" => $this->type,
                        ]);
                    if (!$kriteria) {
                        $this->errorMessage = 'gagal mengubah data kriteria!';
                        return;
                    }
                    break;
                }
        }
        $this->updateViewData();
        $this->emptyForm();
    }

    public function updateViewData()
    {
        $this->updateMinMax();
        // $query = Kriteria::where('is_deleted', '=', false)->where('nama_kriteria', 'like', "%$this->search%");

        // $this->maxPage = ceil($query->count() / $this->limit);
        // $this->listKriteria = $query->skip(($this->page - 1) * $this->limit)
        //     ->limit($this->limit)
        //     ->get();
        $this->listKriteria = Kriteria::where('is_deleted', '=', false)->orderBy("bobot", "ASC")->get();
    }

    public function toPage($page){
        if($page < 1 || $page > $this->maxPage)return;
        $this->page = $page;
        $this->updateViewData();
    }

    public function updateMinMax()
    {

        $sumBobot = Kriteria::selectRaw('sum(bobot) as sum')
            ->where('is_deleted', '=', false)
            ->get();
        if($sumBobot){
            $this->rangeBobot = $sumBobot[0]["sum"];
        }

    }

    public function render()
    {
        return view('livewire.kriteria-component')
            ->extends('templates.new')
            ->section('content');
    }
}
