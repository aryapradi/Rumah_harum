<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnGambarToSampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sampah', function (Blueprint $table) {
            // Add your new column before the existing column (e.g., 'nama')
            $table->string('gambar')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sampah', function (Blueprint $table) {
            // Drop the 'gambar' column if you need to rollback
            $table->dropColumn('gambar');
        });
    }
}
