<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id');
            $table->string('nama');
            $table->string('slug');
            $table->mediumText('deskripsi_singkat');
            $table->longText('deskripsi');
            $table->string('harga_asli');
            $table->string('harga_jual');
            $table->string('gambar');
            $table->string('kuantitas');
            $table->string('pajak');
            $table->tinyInteger('status');
            $table->tinyInteger('tren');
            $table->mediumText('kategori_label');
            $table->mediumText('kategori_keywords');
            $table->mediumText('kategori_deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
