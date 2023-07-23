<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;
use DB;
class KriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $createdAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        DB::table('kriterias')->insert([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'type' => $request->type,
            'created_at'=>$createdAt
        ]);

        return redirect()->back()->with('success','Berhasil menambahkan data kriteria');
    }

    public function update(Request $request,$id)
    {
        $updatedAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        DB::table('kriterias')->where('id',$id)->update([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'type' => $request->type,
            'updated_at'=>$updatedAt
        ]);

        return redirect()->back()->with('success','Berhasil mengubah data kriteria');
    }

    public function delete($id)
    {
        DB::table('kriterias')->where('id',$id)->delete();
        return redirect()->back()->with('success','Berhasil menghapus data kriteria');
    }
}