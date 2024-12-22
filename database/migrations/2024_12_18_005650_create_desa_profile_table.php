<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDesaProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('kode_provinsi')->index('kode_provinsi');
            $table->foreign('kode_provinsi')->references('kode_provinsi')->on('provinsis');
            $table->integer("jumlah_desa");
            $table->integer("jumlah_rt");
            $table->integer("jumlah_rw");
            $table->integer("jumlah_lad");
            $table->integer("jumlah_aparatur_pemerintahan_desa");
            $table->timestamps(3);

            // Add the constraint
            // DB::statement('ALTER TABLE desa_profile ADD CONSTRAINT kode_provinsi;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desa_profiles');
    }
}
