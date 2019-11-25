<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antris extends Model
{
    protected $fillable = [
    'id','data_pasiens_id','polis_id','no_antrian','status'
];

    public function datapasien(){
        return $this->belongsTo(Data_pasiens::class);
    }

    public function poli(){
        return $this->belongsTo(Polis::class);
    }
}
