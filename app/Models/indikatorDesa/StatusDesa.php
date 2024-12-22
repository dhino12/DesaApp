<?php

namespace App\Models\IndikatorDesa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusDesa extends Model
{
    use HasFactory;
    protected $guarded = ['created_at'];

    public function provinsi() {
        return $this->belongsTo(Provinsi::class, "kode_provinsi", "kode_provinsi");
    }
}
