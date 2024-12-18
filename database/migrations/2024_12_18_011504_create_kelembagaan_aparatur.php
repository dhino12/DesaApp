<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelembagaanAparatur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelembagaan_aparaturs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_provinsi')->unique();
            $table->foreign('kode_provinsi')->references('kode_provinsi')->on('provinsis');
            $table->integer("jumlah_anggota_bpd");
            $table->integer("jumlah_anggota_bpd_perempuan");
            $table->integer("jumlah_lkd");
            $table->integer("jumlah_lkd_dasar_hukum_sah");
            $table->integer("jumlah_desa_menetapkan_kepengurusan_posyandu");
            $table->integer("jumlah_aparatur_desa_pelatihan_kapasitas");
            $table->integer("jumlah_desa_aktif_pkk");
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
        Schema::dropIfExists('kelembagaan_aparatur');
    }
}
