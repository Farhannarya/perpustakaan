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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //$table->integer('id');
            $table->string('kode');
            $table->string('judul');
            $table->integer('kategori_id');
            $table->integer('penerbit_id');
            $table->string('isbn');
            $table->string('pengarang');
            $table->integer('jumlah_halaman');
            $table->integer('stok');
            $table->integer('tahun_terbit');
            $table->text('sinopsis');
            $table->string('gambar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
};
