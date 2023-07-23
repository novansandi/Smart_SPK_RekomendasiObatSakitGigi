<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;
use DB;
class SubKriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $createdAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        DB::table('subkriterias')->insert([
            'kriteria_id' => $request->kriteria_id,
            'nama_subkriteria' => $request->nama_subkriteria,
            'nilai_subkriteria' => $request->nilai_subkriteria,
            'created_at'=>$createdAt
        ]);

        return redirect()->back()->with('success','Berhasil menambahkan data sub kriteria');
    }

    public function update(Request $request,$id)
    {
        $updatedAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        DB::table('subkriterias')->where('id',$id)->update([
            'kriteria_id' => $request->kriteria_id,
            'nama_subkriteria' => $request->nama_subkriteria,
            'nilai_subkriteria' => $request->nilai_subkriteria,
            'updated_at'=>$updatedAt
        ]);

        return redirect()->back()->with('success','Berhasil mengubah data sub kriteria');
    }

    public function delete($id)
    {
        DB::table('subkriterias')->where('id',$id)->delete();
        return redirect()->back()->with('success','Berhasil menghapus data sub kriteria');
    }
}