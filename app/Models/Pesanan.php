<?php

namespace App\Models;

use App\Models\ItemPesanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table= 'pesanan';
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'no_telp',
        'alamat',
        'kota',
        'provinsi',
        'total_harga',
        'status',
        'pesan',
        'no_track',
    ];

    public function itempesanan()
    {
        return $this->hasMany(ItemPesanan::class);
    }
}
