<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategori";
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'status',
        'populer',
        'gambar',
        'kategori_label',
        'kategori_deskripsi',
        'kategori_keywords',
    ];
}
