<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\KriteriaComponent;
use App\Http\Livewire\ObatComponent;
use App\Http\Livewire\PerhitunganDosesComponent;
use App\Http\Livewire\RekomendasiObatComponent;
use App\Http\Livewire\SmartComponent;
use App\Http\Livewire\SubkriteriaComponent;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\KeluhanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class,'index']);
    Route::get('/kriteria', KriteriaComponent::class);
    Route::get('/subkriteria', SubkriteriaComponent::class);
    Route::get('/smart', SmartComponent::class);
    Route::get('/obat', ObatComponent::class);
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
});

Route::middleware(['guest'])->group(function () {
    //auth route
    Route::POST('/login', [AuthController::class, "login"]);
    Route::view('/login', 'login')->name("login");
});

Route::get("/", HomeComponent::class);
    Route::get('/rekom-obat', RekomendasiObatComponent::class);
    Route::get("/perhitungan-dosis", PerhitunganDosesComponent::class);

Route::fallback(function(){
    return redirect('/login');
});

Route::post('/kriteria_store', [KriteriaController::class,'store']);
Route::post('/kriteria_update/{id}', [KriteriaController::class,'update']);
Route::get('/kriteria_delete/{id}', [KriteriaController::class,'delete']);

Route::post('/subkriteria_store', [SubKriteriaController::class,'store']);
Route::post('/subkriteria_update/{id}', [SubKriteriaController::class,'update']);
Route::get('/subkriteria_delete/{id}', [SubKriteriaController::class,'delete']);

Route::post('/obat_store', [ObatController::class,'store']);
Route::post('/obat_update/{id}', [ObatController::class,'update']);
Route::get('/obat_delete/{id}', [ObatController::class,'delete']);

//keluhan
Route::get('/keluhan', [KeluhanController::class,'index']);
Route::post('/keluhan_store', [KeluhanController::class,'store']);
Route::post('/keluhan_update/{id}', [KeluhanController::class,'update']);
Route::get('/keluhan_delete/{id}', [KeluhanController::class,'delete']);