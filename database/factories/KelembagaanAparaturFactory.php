<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KelembagaanAparaturFactory extends Factory
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
            "jumlah_anggota_bpd" => mt_rand(1,4),
            "jumlah_anggota_bpd_perempuan" => mt_rand(1,4),
            "jumlah_lkd" => mt_rand(1,4),
            "jumlah_lkd_dasar_hukum_sah" => mt_rand(1,4),
            "jumlah_desa_menetapkan_kepengurusan_posyandu" => mt_rand(1,4),
            "jumlah_aparatur_desa_pelatihan_kapasitas" => mt_rand(1,4),
            "jumlah_desa_aktif_pkk" => mt_rand(1,4),
        ];
    }
}
