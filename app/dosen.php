<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    //
    protected $table = 'dosen';
    protected $fillable = ['nama','nip','alamat','pengguna_id'];
    protected $guarded = ['id'];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }
    public function getUsernameAttribute(){
        return $this->pengguna->username;
    }

    public function Dosen_Matakuliah()
    {
        return $this->hasMany(Dosen_Matakuliah::class);
    }
    public function listDosenDanNip(){
        $out = [];
        foreach ($this->all() as $dsn) {
            $out[$dsn->id] = "{$dsn->nama} ({$dsn->nip})";
        }
        return $out;
    }
}
