<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polis extends Model
{
    //
    protected $fillable = ['id','dokters_id','nama_poli','jam_buka','jam_tutup'];

    public function dataPasienAnak(){
        return $this->hasMany(Data_pasiens::class);
    }
    public function dataPasienGigi(){
        return $this->hasMany(Data_pasien_gigis::class);
    }
    public function dataPasienUmum(){
        return $this->hasMany(Data_pasien_umums::class);
    }
    public function dataPasienMata(){
        return $this->hasMany(Data_pasien_matas::class);
    }
    public function dataDokter(){
        return $this->hasOne(Dokters::class);
    }

    public function dataAntri(){
        return $this->hasMany(Antris::class);
    }
}
