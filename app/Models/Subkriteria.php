<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;
    public $fillable = [
        "kriteria_id",
        "nama_subkriteria",
        "nilai_subkriteria"
    ];
}
