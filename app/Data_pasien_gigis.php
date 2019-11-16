<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_pasien_gigis extends Model
{
    protected $fillable = [
        'id', 'polis_id','no_identitas','nama','kota_lahir','tgl_lahir','alamat','jenis_kelamin'
    ];

    public function poli(){
        return $this->belongsTo(Polis::class);
    }
}
