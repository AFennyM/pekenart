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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nama');
            $table->string('email');
            $table->string('no_telp');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('total_harga');
            $table->tinyInteger('status')->default('0');
            $table->string('pesan')->nullable();
            $table->string('no_track');
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
        Schema::dropIfExists('pesanan');
    }
};
