<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticable;

class Pengguna extends Authenticable
{
    //
    protected $table = 'pengguna';
    protected $fillable = ['username','password'];


    public function mahasiswa() {
    	return $this->hasOne(Mahasiswa::class);
    }

    public function dosen() {
    	return $this->hasOne(Dosen::class);
    }

    public function peran()
	{
		return $this->belongsToMany(Peran::class);
	}
}
