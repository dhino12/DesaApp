<?php

namespace App\Models\IndikatorDesa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $with = ['desaProfile', 'statusDesa', 'regulasiDesa', 'penghargaanDesa', 'kelembagaanAparatur'];

    public function desaProfile() {
        return $this->belongsTo(DesaProfile::class, 'kode_provinsi', 'kode_provinsi');
    }
    public function statusDesa() {
        return $this->belongsTo(StatusDesa::class, 'kode_provinsi', 'kode_provinsi');
    }
    public function regulasiDesa() {
        return $this->belongsTo(RegulasiDesa::class, 'kode_provinsi', 'kode_provinsi');
    }
    public function penghargaanDesa() {
        return $this->belongsTo(PenghargaanDesa::class, 'kode_provinsi', 'kode_provinsi');
    }
    public function kelembagaanAparatur() {
        return $this->belongsTo(KelembagaanAparatur::class, 'kode_provinsi', 'kode_provinsi');
    }
}
