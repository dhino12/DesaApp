<?php

namespace App\Models\IndikatorDesa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesaProfile extends Model
{
    use HasFactory;
    protected $guarded = ['created_at'];
    protected $primaryKey = 'id';

    // protected $dateFormat = 'Y-m-d H:i:s.u';
    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d H:i:s.u',
    //     'updated_at' => 'datetime:Y-m-d H:i:s.u',
    // ];

    public function provinsi() {
        return $this->belongsTo(Provinsi::class, "kode_provinsi", "kode_provinsi");
    }
}
