<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_pasien_matas extends Model
{
    protected $fillable = [
        'id','users_id','no_identitas','nama','kota_lahir','tgl_lahir','alamat','jenis_kelamin'
    ];

    public function poli(){
        return $this->belongsTo(Polis::class);
    }

    public function antrimata(){
        return $this->hasOne(Antri_matas::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
