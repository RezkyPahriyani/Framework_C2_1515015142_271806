<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pengguna;

class penggunacontroller extends Controller
{
    public function awal()
    {
        // return "Hello dari PenggunaController";
        return view('pengguna.awal', ['data'=>Pengguna::all()]);
    }

    public function tambah()
    {
        // return $this->simpan();
        return view('pengguna.tambah');
    }

    public function simpan(Request $input)
    {
        // $pengguna = new Pengguna();
     //    $pengguna -> username = 'kimebmen';
     //    $pengguna -> password = '12345678';
     //    $informasi = $pengguna->save()? 'Berhasil simpan data': 'Gagal simpan data';
     //    return redirect ('pengguna')->with(['informasi'=>$informasi]);
     //    $pengguna->save();
        // return "Data dengan username {$pengguna->username} Telah Disimpan";
        $this -> validate($input,[
            'username'=>'required',
            'password'=>'required',
            ]);
        $pengguna = new Pengguna;
        $pengguna->username = $input->username;
        $pengguna->password = $input->password;;
        $informasi = $pengguna->save() ? 'Berhasil simpan data' : 'Gagal simpan data';
        return redirect ('pengguna')->with(['informasi'=>$informasi]); 
    }
    public function edit($id)
    {
        $pengguna = Pengguna::find($id);
        return view('pengguna.edit')-> with(array('pengguna'=>$pengguna));
    }

    public function lihat($id)
    {
        $pengguna = Pengguna::find($id);
        return view('pengguna.lihat')->with(array('pengguna'=>$pengguna));
    }

    public function update($id, Request $input)
    {
        $pengguna = Pengguna::find($id);
        $pengguna -> username = $input->username;
        $pengguna -> password = $input->password;
        $informasi = $pengguna->save() ? 'Berhasil update data': 'Gagal update data';
        return redirect ('pengguna') -> with (['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $pengguna = Pengguna::find($id);
        $informasi = $pengguna->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        return redirect('pengguna')-> with(['informasi'=>$informasi]);
    }
}
