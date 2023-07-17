<?php

namespace App\Http\Livewire;

use App\Models\DetailObat;
use App\Models\Kriteria;
use App\Models\Obat;
use App\Models\Subkriteria;
use Livewire\Component;
use DB;
class SmartComponent extends Component
{
    public $listObat = [];
    public $arrData = [];
    public $listKriteria;

    //paggination
    public $page = 1, $limit = 20, $maxPage = 0;

    public function mount()
    {
    }


    public function smart()
    {
        $obat = DB::table('obats as obt')
                ->where('obt.is_deleted',0)
                ->select('obt.id')
                ->get();
        $arrData = [];
        foreach ($obat as $obatKey => $obatValue) 
        {
           $detail = DB::table('detail_obats')->where('obat_id',$obatValue->id)->get();
           foreach ($detail as $detailKey => $detailValue) 
           {
               $kriteria = DB::table('kriterias')->where('id',$detailValue->kriteria_id)->first();
               if($kriteria)
               {  
                   if($kriteria->type == 'cost')
                   {
                        //cost
                        $minValue = 0;
                        $maxValue = 0;
                        $dataMinMaxValue = DB::table('detail_obats as dobt')
                                        ->join('obats as obt','obt.id','=','dobt.obat_id')
                                        ->where('obt.is_deleted',0)
                                        ->where('kriteria_id',$kriteria->id)
                                        ->select('cost')
                                        ->get();
                        $arrMinMxValue = [];
                        foreach ($dataMinMaxValue as $dataMinMaxValueKey => $dataMinMaxValueValue) 
                        {
                            array_push($arrMinMxValue, $dataMinMaxValueValue->cost);
                        }
                        $minValue = min($arrMinMxValue);
                        $maxValue = max($arrMinMxValue);
                        $kriteriaBobot = $detailValue->cost;
                        if($kriteriaBobot - $minValue > 0)
                        {
                            $kriteriaBobot = $detailValue->cost;
                            $kriteriaBobot = ($kriteriaBobot - $minValue) / ($maxValue - $minValue);
                        }else
                        {
                            $kriteriaBobot = 0;
                        }
                        $arrData[$obatValue->id][$kriteria->id]= $kriteriaBobot;
                   }else
                   {
                        //benefit
                        $minValue = 0;
                        $maxValue = 0;
                        $dataMinMaxValue = DB::table('detail_obats as dobt')
                                        ->join('obats as obt','obt.id','=','dobt.obat_id')
                                        ->where('obt.is_deleted',0)
                                        ->where('kriteria_id',$kriteria->id)
                                        ->select('benefit')
                                        ->get();
                        $arrMinMxValue = [];
                        foreach ($dataMinMaxValue as $dataMinMaxValueKey => $dataMinMaxValueValue) 
                        {
                            array_push($arrMinMxValue, $dataMinMaxValueValue->benefit);
                        }
                        $minValue = min($arrMinMxValue);
                        $maxValue = max($arrMinMxValue);
                        $kriteriaBobot = $detailValue->benefit;
                        if($maxValue - $kriteriaBobot  > 0)
                        {
                            $kriteriaBobot = $detailValue->benefit;
                            $kriteriaBobot = ($maxValue - $kriteriaBobot) / ($maxValue - $minValue);
                        }else
                        {
                            $kriteriaBobot = 0;
                        }

                        $arrData[$obatValue->id][$kriteria->id] = $kriteriaBobot;
                   }
               }
           }
        }
        $this->arrData = $arrData;
        foreach ($arrData as $key => $value) 
        {
            foreach ($value as $i => $item) 
            {
                $kriteriaBobotMaster = DB::table('kriterias')->where('id',$i)->first();
                if($kriteriaBobotMaster)
                {
                    $arrData[$key][$i] = $item * ($kriteriaBobotMaster->bobot / 100);
                }
            }
        }

        foreach ($arrData as $key => $value) 
        {
            $nilai_akhir = array_sum($value);
            DB::table('obats')->where('id',$key)->update(['nilai_akhir'=>$nilai_akhir]);
        }
    }

    public function updateViewData()
    {
        $query = Obat::where('is_deleted', '=', false);

        $this->maxPage = ceil($query->count() / $this->limit);
        $this->listKriteria = Kriteria::orderBy("id")->get()->toArray();
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
        $this->smart();
        $this->updateViewData();
        return view('livewire.smart-component')
            ->extends('templates.admin')
            ->section('slot');
    }
}
