<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    //
    protected $table = 'ruangan';
    protected $fillable = ['title'];
    protected $guarded = ['id'];

      public function jadwal_matakuliah()
    {
        return $this->hasMany(Jadwal_Matakuliah::class);
    }
}
