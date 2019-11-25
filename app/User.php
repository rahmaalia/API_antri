<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','nama', 'username','no_telp', 'password',
    ];

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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}
