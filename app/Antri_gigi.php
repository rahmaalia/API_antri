<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antri_gigi extends Model
{
    protected $fillable = [
        'id','data_pasiens_gigis_id','polis_id','no_antrian','status'
    ];
    
        public function datapasien(){
            return $this->belongsTo(Data_pasien_gigis::class);
        }
    
        public function poli(){
            return $this->belongsTo(Polis::class);
        }
}
