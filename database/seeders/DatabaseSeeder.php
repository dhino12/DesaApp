<?php

namespace Database\Seeders;

use App\Models\IndikatorDesa\DesaProfile;
use App\Models\IndikatorDesa\KelembagaanAparatur;
use App\Models\IndikatorDesa\PenghargaanDesa;
use App\Models\IndikatorDesa\Provinsi;
use App\Models\IndikatorDesa\RegulasiDesa;
use App\Models\IndikatorDesa\StatusDesa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Provinsi::create([
            "kode_provinsi" => "11",
            "name_provinsi" => "Aceh"
        ]);
        Provinsi::create([
            "kode_provinsi" => "12",
            "name_provinsi" => "Sumatera Utara"
        ]);
        Provinsi::create([
            "kode_provinsi" => "13",
            "name_provinsi" => "Sumatera Barat"
        ]);
        Provinsi::create([
            "kode_provinsi" => "14",
            "name_provinsi" => "Riau"
        ]);
        Provinsi::create([
            "kode_provinsi" => "15",
            "name_provinsi" => "Jambi"
        ]);
        Provinsi::create([
            "kode_provinsi" => "16",
            "name_provinsi" => "Sumatera Selatan"
        ]);
        Provinsi::create([
            "kode_provinsi" => "17",
            "name_provinsi" => "Bengkulu"
        ]);
        Provinsi::create([
            "kode_provinsi" => "18",
            "name_provinsi" => "Lampung"
        ]);
        Provinsi::create([
            "kode_provinsi" => "19",
            "name_provinsi" => "Kepulauan Bangka Belitung"
        ]);
        DesaProfile::factory(3)->create();
        StatusDesa::factory(3)->create();
        RegulasiDesa::factory(3)->create();
        PenghargaanDesa::factory(3)->create();
        KelembagaanAparatur::factory(3)->create();
    }
}
