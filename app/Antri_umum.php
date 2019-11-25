<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antri_umum extends Model
{
    protected $fillable = [
        'id','data_pasien_umums_id','polis_id','no_antrian','status'
    ];
    
        public function datapasienumum(){
            return $this->belongsTo(Data_pasien_umums::class);
        }
    
        public function poli(){
            return $this->belongsTo(Polis::class);
        }
}
