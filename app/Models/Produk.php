<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'kategori_id',
        'nama',
        'slug',
        'deskripsi_singkat',
        'deskripsi',
        'harga_asli',
        'harga_jual',
        'gambar',
        'pajak',
        'status',
        'tren',
        'kategori_label',
        'kategori_keywords',
        'kategori_deskripsi',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}