<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PenghargaanDesaFactory extends Factory
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
            "jumlah_desa_menerima_penghargaan_kecamatan" => mt_rand(1,4),
            "jumlah_desa_menerima_penghargaan_kabupaten" => mt_rand(1,4),
            "jumlah_desa_menerima_penghargaan_provinsi" => mt_rand(1,4),
            "jumlah_desa_menerima_penghargaan_nasional" => mt_rand(1,4),
            "jumlah_desa_menerima_penghargaan_internasional" => mt_rand(1,4),
            "jumlah_desa_musrenbang_tertib" => mt_rand(1,4),
            "jumlah_desa_rpjmdes_tepat_waktu" => mt_rand(1,4),
            "jumlah_desa_rkpdes_tepat_waktu" => mt_rand(1,4),
            "jumlah_desa_sertifikat_kantor" => mt_rand(1,4),
            "jumlah_pades" => mt_rand(1,4),
        ];
    }
}
