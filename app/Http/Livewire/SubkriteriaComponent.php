<?php

namespace App\Http\Livewire;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Livewire\Component;

class SubkriteriaComponent extends Component
{
    public $kriteria_id, $nama_subkriteria, $nilai_subkriteria;
    public $listSubkriteria = [], $listKriteria = [];
    public $search;

    //pagination
    public $page = 1, $limit = 20, $maxPage = 0;

    //save/edit
    public $mode = 'save';
    public $selected = [];
    public $errorMessage = '';

    public function mount(){
        $this->listKriteria = Kriteria::where('is_deleted', '=', false)
            ->get();

        $this->updateViewData();
    }

    public function emptyForm(){
        $this->kriteria_id = $this->nama_subkriteria = $this->nilai_subkriteria = '';
    }

    public function edit($index){
        $this->selected = $this->listSubkriteria[$index];
        $this->kriteria_id = $this->selected["kriteria_id"];
        $this->nama_subkriteria = $this->selected["nama_subkriteria"];
        $this->nilai_subkriteria = $this->selected["nilai_subkriteria"];
        $this->mode = 'edit';
    }

    public function delete($index){
        $this->selected = $this->listSubkriteria[$index];
        $this->mode = 'delete';
    }

    public function confirmDelete(){
        $subkriteria = Subkriteria::where('id', '=', $this->selected["id"])
            ->update(['is_deleted' => true]);
        if(!$subkriteria){
            $this->errorMessage = 'gagal menghapus data subkriteria!';
            return;
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
                    $kriteria = Subkriteria::create([
                        'kriteria_id' => $this->kriteria_id,
                        'nama_subkriteria' => $this->nama_subkriteria,
                        'nilai_subkriteria' => $this->nilai_subkriteria,
                    ]);

                    if (!$kriteria) {
                        $this->errorMessage = "gagal menambahkan data kriteria!";
                        return;
                    }
                    break;
                }
            case "edit": {
                    $kriteria = Subkriteria::where('id', $this->selected["id"])
                        ->update([
                            'kriteria_id' => $this->kriteria_id,
                            'nama_subkriteria' => $this->nama_subkriteria,
                            'nilai_subkriteria' => $this->nilai_subkriteria,
                        ]);
                    if (!$kriteria) {
                        $this->errorMessage = 'gagal mengubah data kriteria!';
                        return;
                    }
                    break;
                }
        }
        $this->emptyForm();
    }

    public function updateViewData(){
        $query = Subkriteria::select('subkriterias.*', 'kriterias.nama_kriteria')
            ->where('subkriterias.is_deleted', '=', false)->where('nama_subkriteria', 'like', "%$this->search%")
            ->join('kriterias', 'kriterias.id', '=', 'subkriterias.kriteria_id')
            ->orderBy('subkriterias.kriteria_id', 'asc');

        $this->maxPage = ceil($query->count() / $this->limit);
        $this->listSubkriteria = $query->skip(($this->page - 1) * $this->limit)
            ->limit($this->limit)
            ->get();
    }

    public function toPage($page){
        if($page < 1 || $page > $this->maxPage)return;
        $this->page = $page;
    }

    public function render()
    {
        $this->updateViewData();
        return view('livewire.subkriteria-component')
            ->extends('templates.admin')
            ->section('slot');
    }
}
