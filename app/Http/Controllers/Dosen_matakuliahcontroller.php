<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen_matakuliah;

class Dosen_matakuliahcontroller extends Controller
{
    //
    public function awal()
    {
    	return "Hello dari Dosen_matakuliahcontroller";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$dosen_matakuliah = new dosen_matakuliah();
    	$dosen_matakuliah -> dosen_id = 1;
    	$dosen_matakuliah -> matakuliah_id =1;

    	$dosen_matakuliah->save();
    	return "Data dengan id dosen : {$dosen_matakuliah->dosen_id} dan id matakuliah : {$dosen_matakuliah->matakuliah_id} Telah disimpan";

    }
}
