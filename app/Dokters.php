<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    
    protected $fillable = [
        'id','nama_Dokter'
    ];

    public function dokter(){
        return $this->belongsTo(Polis::class);
    }
}
