<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPesanan extends Model
{
    use HasFactory;
    protected $table = 'item_pesanan';
    protected $fillable = [
        'pesanan_id',
        'produk_id',
        'harga',
        'kuantitas',
    ];

}
