<?php

namespace Database\Factories\IndikatorDesa;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegulasiDesaFactory extends Factory
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
            "jumlah_peraturan_desa" => mt_rand(1,4),
            "jumlah_peraturan_kepala_desa" => mt_rand(1,4),
            "jumlah_peraturan_bersama_kepala_desa" => mt_rand(1,4),
            "jumlah_keputusan_kepala_desa" => mt_rand(1,4),
            "jumlah_desa_memiliki_sop_spm" => mt_rand(1,4),
            "jumlah_desa_memiliki_peraturan_kerjasama_antar_desa" => mt_rand(1,4),
            "jumlah_desa_memiliki_peraturan_kerjasama_pihak_ketiga" => mt_rand(1,4),
            "jumlah_desa_melaksanakan_kerjasama_bkad_bumdes" => mt_rand(1,4),
        ];
    }
}
