<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;
use DB;
class KeluhanController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$data = DB::table('keluhan')->get();
    	return view('livewire.keluhan',compact('data'));
    }

    public function store(Request $request)
    {
    	$createdAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
    	DB::table('keluhan')->insert([
    		'nama'=>$request->nama,
    		'created_at'=>$createdAt
    	]);

    	return redirect()->back()->with('success','data berhasil ditambahkan');
    }

    public function update(Request $request,$id)
    {
    	$createdAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
    	DB::table('keluhan')->where('id',$id)->update([
    		'nama'=>$request->nama,
    		'updated_at'=>$createdAt
    	]);

    	return redirect()->back()->with('success','data berhasil diubah');
    }

    public function delete($id)
    {
    	DB::table('keluhan')->where('id',$id)->delete();
    	return redirect()->back()->with('success','data berhasil dihapus');
    }
}