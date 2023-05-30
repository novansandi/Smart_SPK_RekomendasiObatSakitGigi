<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Livewire\KriteriaComponent;
use App\Http\Livewire\ObatComponent;
use App\Http\Livewire\SmartComponent;
use App\Http\Livewire\SubkriteriaComponent;

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
    Route::view('/dashboard', 'dashboard');
    Route::get('/kriteria', KriteriaComponent::class);
    Route::get('/subkriteria', SubkriteriaComponent::class);
    Route::get('/smart', SmartComponent::class);
    Route::get('/obat', ObatComponent::class);
});

Route::middleware(['guest'])->group(function () {
    //auth route
    Route::POST('/login', [AuthController::class, "login"]);
    Route::view('/login', 'login')->name("login");
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
});

Route::fallback(function(){
    return redirect('/login');
});
