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
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->longText('deskripsi');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('populer')->default('0');
            $table->string('gambar');
            $table->string('kategori_label');
            $table->string('kategori_deskripsi');
            $table->string('kategori_keywords');
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
        Schema::dropIfExists('kategori');
    }
};
