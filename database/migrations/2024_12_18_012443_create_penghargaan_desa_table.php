<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghargaanDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghargaan_desas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_provinsi')->unique();
            $table->foreign('kode_provinsi')->references('kode_provinsi')->on('provinsis');
            $table->integer("jumlah_desa_menerima_penghargaan_kecamatan");
            $table->integer("jumlah_desa_menerima_penghargaan_kabupaten");
            $table->integer("jumlah_desa_menerima_penghargaan_provinsi");
            $table->integer("jumlah_desa_menerima_penghargaan_nasional");
            $table->integer("jumlah_desa_menerima_penghargaan_internasional");
            $table->integer("jumlah_desa_musrenbang_tertib");
            $table->integer("jumlah_desa_rpjmdes_tepat_waktu");
            $table->integer("jumlah_desa_rkpdes_tepat_waktu");
            $table->integer("jumlah_desa_sertifikat_kantor");
            $table->integer("jumlah_pades");
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
        Schema::dropIfExists('penghargaan_desa');
    }
}
