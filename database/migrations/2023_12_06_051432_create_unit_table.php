<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitTable extends Migration
{
    public function up()
    {
        Schema::create('unit', function (Blueprint $table) {
            $table->id();
            $table->string('nama_unit');
            $table->string('gambar');
            $table->date('tanggal');
            $table->integer('sk_unit');
            $table->integer('sk_terbit');
            $table->integer('nomor_sk');
            $table->unsignedBigInteger('id_pengajuan');
            $table->bigInteger('nomor_handphone')->length(20);
            $table->bigInteger('nomor_telepon')->length(20);   
            $table->char('provinsi');
            $table->char('kabupaten');
            $table->char('kecamatan');
            $table->char('kelurahan');
            $table->integer('kodepos');
            $table->string('alamat_lengkap');
            $table->timestamps();

            $table->foreign('id_pengajuan')->references('id')->on('pengajuan');
            $table->foreign('provinsi')->references('id')->on('provinces');
            $table->foreign('kabupaten')->references('id')->on('regencies');
            $table->foreign('kecamatan')->references('id')->on('districts');
            $table->foreign('kelurahan')->references('id')->on('villages');



        });
    }

    public function down()
    {
        Schema::dropIfExists('units');
    }
}
