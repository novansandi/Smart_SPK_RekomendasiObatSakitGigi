<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;
use DB;
class ObatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $createdAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $listKriteria = json_decode(json_encode(DB::table('kriterias')->where('is_deleted',0)->get()),true);
        //dd($listKriteria);
        $obatId = DB::table('obats')->insertGetId([
            'kode_obat' => $request->kode_obat,
            'dosis_dewasa'=>$request->dosis_dewasa,
            'takaran_per_hari'=>$request->takaran_per_hari,
            'created_at'=>$createdAt
        ]);
        foreach ($listKriteria as $index => $kriteria) 
        {
            $kriteriaData = DB::table('kriterias')->where('id',$kriteria['id'])->first();
            $subkriteriaData = DB::table('subkriterias')->where('id',$request->subkriteria_id[$index])->first();
            if($kriteriaData)
            {
                if($subkriteriaData)
                {
                    if($kriteriaData->type == 'benefit')
                    {
                        $detail = DB::table('detail_obats')->insert([
                            'obat_id' => $obatId,
                            'kriteria_id' => $kriteria['id'],
                            'subkriteria_id' => $request->subkriteria_id[$index],
                            'benefit'=>$subkriteriaData->nilai_subkriteria,
                            'cost'=>0,
                            'created_at'=>$createdAt
                        ]);
                    }else
                    {
                        $detail = DB::table('detail_obats')->insert([
                                'obat_id' => $obatId,
                                'kriteria_id' => $kriteria['id'],
                                'subkriteria_id' => $request->subkriteria_id[$index],
                                'benefit'=>0,
                                'cost'=>$subkriteriaData->nilai_subkriteria,
                                'created_at'=>$createdAt
                        ]);
                    }
                }
            }
        }
        return redirect()->back()->with('success','Berhasil menambahkan data obat');
    }

    public function update(Request $request,$id)
    {
        $updatedAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $listKriteria = json_decode(json_encode(DB::table('kriterias')->where('is_deleted',0)->get()),true);
        DB::table('obats')->where('id',$id)->update([
            'kode_obat' => $request->kode_obat,
            'dosis_dewasa'=>$request->dosis_dewasa,
            'takaran_per_hari'=>$request->takaran_per_hari,
            'updated_at'=>$updatedAt
        ]);
        foreach ($listKriteria as $index => $kriteria) 
        {
            $kriteriaData = DB::table('kriterias')->where('id',$kriteria['id'])->first();
            $subkriteriaData = DB::table('subkriterias')->where('id',$request->subkriteria_id[$index])->first();
            if($kriteriaData)
            {
                if($subkriteriaData)
                {
                   // dd('ok');
                    if($kriteriaData->type == 'benefit')
                    {
                        $detail = DB::table('detail_obats')
                        ->where('obat_id',$id)
                        ->where('kriteria_id',$kriteria['id'])
                        //->where('subkriteria_id',$request->subkriteria_id[$index])
                        ->update([
                            'obat_id' => $id,
                            'kriteria_id' => $kriteria['id'],
                            'subkriteria_id' => $request->subkriteria_id[$index],
                            'benefit'=>$subkriteriaData->nilai_subkriteria,
                            'cost'=>0,
                            'updated_at'=>$updatedAt
                        ]);
                    }else
                    {
                        $detail = DB::table('detail_obats')
                        ->where('obat_id',$id)
                        ->where('kriteria_id',$kriteria['id'])
                        //->where('subkriteria_id',$request->subkriteria_id[$index])
                        ->update([
                                'obat_id' => $id,
                                'kriteria_id' => $kriteria['id'],
                                'subkriteria_id' => $request->subkriteria_id[$index],
                                'benefit'=>0,
                                'cost'=>$subkriteriaData->nilai_subkriteria,
                                'updated_at'=>$updatedAt
                        ]);
                    }
                }
            }
        }
        return redirect()->back()->with('success','Berhasil mengubah data obat');
    }

    public function delete($id)
    {
        DB::table('obats')->where('id',$id)->delete();
        return redirect()->back()->with('success','Berhasil menghapus data obat');
    }
}