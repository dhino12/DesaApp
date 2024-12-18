<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatusDesaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "kode_provinsi" => strval(mt_rand(12,19)),
            "jumlah_desa_swadaya" => mt_rand(1,4),
            "jumlah_desa_swakarya" => mt_rand(1,4),
            "jumlah_desa_swasembada" => mt_rand(1,4),
            "jumlah_desa_rumah_tidak_layak_huni" => mt_rand(1,4),
            "jumlah_desa_sanitasi_kurang_bagus" => mt_rand(1,4),
            "jumlah_desa_menyewa_kantor_desa" => mt_rand(1,4),
        ];
    }
}
