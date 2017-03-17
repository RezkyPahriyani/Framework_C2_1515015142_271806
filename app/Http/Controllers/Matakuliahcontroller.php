<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Matakuliah;

class Matakuliahcontroller extends Controller
{
    //
     public function awal()
    {
    	return "Hello dari Matakuliahcontroller";
    }

    public function tambah()
    {
    	return $this->simpan();
    }

    public function simpan()
    {
    	$matakuliah = new Matakuliah();
    	$matakuliah -> title = 'Pemrograman Framework';
    	$matakuliah -> keterangan = 'Mata Kuliah Wajib';
    	$matakuliah->save();
    	return "Data dengan title {$matakuliah->title} Telah Disimpan";
    	
    }
}
