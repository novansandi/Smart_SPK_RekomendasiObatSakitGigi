<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;
use DB;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $obat = DB::table('obats')->where('is_deleted',0)->count();
        $kriteria = DB::table('kriterias')->where('is_deleted',0)->count();
        $subkriteria = DB::table('subkriterias')->where('is_deleted',0)->count();
        return view('dashboard',compact('obat','kriteria','subkriteria'));
    }
}