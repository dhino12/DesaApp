<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulasiDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulasi_desa', function (Blueprint $table) {
            $table->id()->index();
            $table->string('kode_provinsi')->unique();
            $table->foreign('kode_provinsi')->references('kode_provinsi')->on('provinsi');
            $table->integer("jumlah_peraturan_desa");
            $table->integer("jumlah_peraturan_kepala_desa");
            $table->integer("jumlah_peraturan_bersama_kepala_desa");
            $table->integer("jumlah_keputusan_kepala_desa");
            $table->integer("jumlah_desa_memiliki_sop_spm");
            $table->integer("jumlah_desa_memiliki_peraturan_kerjasama_antar_desa");
            $table->integer("jumlah_desa_memiliki_peraturan_kerjasama_pihak_ketiga");
            $table->integer("jumlah_desa_melaksanakan_kerjasama_bkad_bumdes");
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
        Schema::dropIfExists('regulasi_desa');
    }
}
