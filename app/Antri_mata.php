<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antri_mata extends Model
{
    protected $fillable = [
        'id','data_pasien_matas_id','polis_id','no_antrian','status'
    ];
    
        public function datapasienmata(){
            return $this->belongsTo(Data_pasien_matas::class);
        }
    
        public function poli(){
            return $this->belongsTo(Polis::class);
        }
}
