<?php

namespace Database\Factories;

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
        return [
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
