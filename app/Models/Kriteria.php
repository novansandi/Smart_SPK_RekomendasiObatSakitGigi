<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    public $fillable = ['kode_kriteria', 'nama_kriteria', 'bobot', 'type'];
}
