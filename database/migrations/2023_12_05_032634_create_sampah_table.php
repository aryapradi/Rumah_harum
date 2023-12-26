<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga_nasabah');
            $table->integer('harga_unit');
            $table->foreignId('jenis_sampah_id')->constrained('jenis_sampah');
            $table->foreignId('satuan_id')->constrained('satuan');
            $table->foreignId('status_id')->constrained('status_sampah');
            $table->string('keterangan');
            // Tambahkan kolom lain jika diperlukan
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
        Schema::dropIfExists('sampah');
    }
}
