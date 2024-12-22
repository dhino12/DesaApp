<?php

namespace Database\Factories\IndikatorDesa;

use Illuminate\Database\Eloquent\Factories\Factory;

class DesaProfileFactory extends Factory
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
            "jumlah_desa" => mt_rand(1,4),
            "jumlah_rt" => mt_rand(1,4),
            "jumlah_rw" => mt_rand(1,4),
            "jumlah_lad" => mt_rand(1,4),
            "jumlah_aparatur_pemerintahan_desa" => mt_rand(1,4)
        ];
    }
}
