<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisSampahTable extends Migration
{
    public function up()
    {
        Schema::create('jenis_sampah', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            // Add other fields as needed...
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_sampah');
    }
}
