<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailObat extends Model
{
    use HasFactory;

    public $fillable = [
        'obat_id',
        'kriteria_id',
        'subkriteria_id'
    ];
}
