<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dosen;

class Dosencontroller extends Controller
{
    //
    public function awal()
    {
    	return "Hello dari Dosencontroller";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$dosen = new Dosen();
    	$dosen -> nama = "Rezky pahriyani";
    	$dosen -> nip = "1515015142";
    	$dosen -> alamat = "monginsidi";
    	$dosen -> pengguna_id = 1;

    	$dosen -> save();
    	return "Data dengan nama {$dosen->nama} Telah Disimpan";
    }
}
