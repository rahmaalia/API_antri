<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal_dokter extends Model
{
    //
    protected $fillable = [
        'id_jadwalDokter','jam','kuota_antrian'
    ];
}
