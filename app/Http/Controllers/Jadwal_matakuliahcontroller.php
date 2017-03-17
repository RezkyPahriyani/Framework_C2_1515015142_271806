<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Jadwal_matakuliah;


class Jadwal_matakuliahcontroller extends Controller
{
    //
    public function awal()
    {
    	return "Hello dari Jadwal_matakuliahcontroller";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$jadwal_matakuliah = new Jadwal_matakuliah();
    	$jadwal_matakuliah -> mahasiswa_id = 1;
    	$jadwal_matakuliah -> ruangan_id = 1;

    	$jadwal_matakuliah -> dosen_matakuliah_id = 1;
    	$jadwal_matakuliah -> save();
    	return "Data dengan Id Mahasiswa : {$jadwal_matakuliah->mahasiswa_id} Telah Disimpan";
    }
}
