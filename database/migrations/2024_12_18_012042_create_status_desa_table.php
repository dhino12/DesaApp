<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_desas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_provinsi')->unique();
            $table->foreign('kode_provinsi')->references('kode_provinsi')->on('provinsis');
            $table->integer("jumlah_desa_swadaya");
            $table->integer("jumlah_desa_swakarya");
            $table->integer("jumlah_desa_swasembada");
            $table->integer("jumlah_desa_rumah_tidak_layak_huni");
            $table->integer("jumlah_desa_sanitasi_kurang_bagus");
            $table->integer("jumlah_desa_menyewa_kantor_desa");
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
        Schema::dropIfExists('status_desa');
    }
}
