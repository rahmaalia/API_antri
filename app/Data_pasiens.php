<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_pasiens extends Model
{
    protected $fillable = [
        'id','users_id', 'polis_id','no_identitas','nama','kota_lahir','tgl_lahir','alamat','jenis_kelamin'
    ];

    public function poli(){
        return $this->belongsTo(Polis::class);
    }

    public function antri(){
        return $this->hasOne(Antris::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
