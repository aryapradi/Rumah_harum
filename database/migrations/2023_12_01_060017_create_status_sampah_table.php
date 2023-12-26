<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusSampahTable extends Migration
{
    public function up()
    {
        Schema::create('status_sampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            // Add other fields as needed...
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_sampah');
    }
}

