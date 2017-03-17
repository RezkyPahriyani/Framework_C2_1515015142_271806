<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mahasiswa

class Mahasiswacontroller extends Controller
{
    //
    public function awal()
    {
    	return "Hello dari Mahasiswacontroller";
    }

    public function tambah()
    {
    	return $this->simpan();
    }

    public function simpan()
    {
    	$mahasiswa = new Mahasiswa();
    	$mahasiswa->nama = 'Rezky Pahriyani';
    	$mahasiswa->nim = '1515015142';
    	$mahasiswa->alamat = 'Grogot';
    	$mahasiswa->pengguna_id = 1;
    	$mahasiswa->save();
        
    	return "Data dengan Nama {$mahasiswa->nama} Telah Disimpan";
    }
}
