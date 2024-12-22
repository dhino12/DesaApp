<?php

namespace Database\Factories\IndikatorDesa;

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
        $length = 15; // Panjang angka random
        $randomNumber = str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
        return [
            "id" => $randomNumber,
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
