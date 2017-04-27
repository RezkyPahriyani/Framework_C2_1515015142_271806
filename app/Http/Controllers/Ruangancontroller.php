<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ruangan;

class Ruangancontroller extends Controller
{
     public function awal()
    {
        // return "Hello dari RuanganController";
        return view('ruangan.awal',['data'=>Ruangan::all()]) ;
    }

    public function tambah()
    {
        // return $this->simpan();
        return view('ruangan.tambah') ;
    }

    public function simpan(Request $input)
    {
        // $ruang = new Ruangan();
        // $ruang -> title = 'Lab BP';
        // $ruang->save();
        
        // return "Data dengan title {$ruang->title} Telah Disimpan";
        
        $ruangan = new Ruangan;
        $ruangan->title = $input ->title;
        $informasi = $ruangan-> save()  ? 'Berhasil simpan data' : 'Gagal simpan data';
        return redirect('ruangan')->with(['informasi'=>$informasi]);
    }
    public function edit($id)
    {
        $ruangan = Ruangan::find($id);
        return view('ruangan.edit')->with(array('ruangan'=>$ruangan));
    }
    public function lihat($id)
    {
        $ruangan = Ruangan::find($id);
        return view('ruangan.lihat')->with(array('ruangan'=>$ruangan));
    }
    public function update($id, Request $input)
    {
        $ruangan = Ruangan::find($id);
        $ruangan -> title = $input->title;
        $informasi = $ruangan -> save() ? 'Berhasil update data' : 'Gagal update data';
        return redirect('ruangan')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $ruangan = Ruangan::find($id);
        $informasi = $ruangan->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        return redirect('ruangan')->with(['informasi'=>$informasi]);

    }
}
