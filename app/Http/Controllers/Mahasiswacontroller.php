<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mahasiswa;
use App\Pengguna;

class Mahasiswacontroller extends Controller
{
    protected $informasi = 'Gagal melakukan aksi'; //
    public function awal()
    {   
        // return view('mahasiswa.awal', ['data'=>Mahasiswa::all()]);           //

        $semuaMahasiswa = Mahasiswa::all();//
        return view('mahasiswa.awal', compact('semuaMahasiswa'));
        // return "Hello dari MahasiswaController";
    }

    public function tambah()
    {
        // return $this->simpan();
        return view('mahasiswa.tambah');
    }

    public function simpan(Request $input)
    {
        // $mahasiswa = new Mahasiswa();
        // $mahasiswa->nama = 'Kimebmen Simbolon';
        // $mahasiswa->nim = '1515015131';
        // $mahasiswa->alamat = 'Samarinda';
        // $mahasiswa->pengguna_id = 1;
        // $mahasiswa->save();
        // return "Data dengan Nama {$mahasiswa->nama} Telah Disimpan";
        $pengguna = new Pengguna($input->only('username','password'));
            if ($pengguna->save()) {
                $mahasiswa = new Mahasiswa;
                $mahasiswa->nama = $input->nama;
                $mahasiswa->nim = $input->nim;
                $mahasiswa->alamat = $input->alamat;
                if($pengguna->mahasiswa()->save($mahasiswa)) $this->informasi='Berhasil simpan data';
            }        
        return redirect ('mahasiswa')->with(['informasi'=>$this->informasi]);        
    }    
            
// $pengguna = new Pengguna($input->only('username','password'));
//         if ($pengguna->save()) {
//         $mahasiswa = new Mahasiswa;
//         $mahasiswa->nama = $input->nama;
//         $mahasiswa->nim = $input->nim;
//         $mahasiswa->alamat = $input->alamat;
//         $mahasiswa->pengguna_id = $input->pengguna_id;
//         $informasi = $mahasiswa->save() ? 'Berhasil simpan data' : 'Gagal simpan data';
//         return redirect ('mahasiswa')->with(['informasi'=>$informasi]);

            // $mahasiswa = Mahasiswa::find($id);
            // $mahasiswa = new Mahasiswa;
            // $mahasiswa->nama = $input->nama;
            // $mahasiswa->nim = $input->nim;
            // $mahasiswa->alamat = $input->alamat;    
            // $informasi = $mahasiswa->save() ? 'Berhasil update data': 'Gagal update data';
            // return redirect ('mahasiswa')->with(['informasi'=>$informasi]); 

    
        // $mahasiswa->pengguna_id = $input->pengguna_id;
        // $informasi->save() ?  'Berhasil simpan data' : 'Gagal simpan data';
    

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit')-> with(array('mahasiswa'=>$mahasiswa));
    }

    public function lihat($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function update($id, Request $input)
    {
        $mahasiswa = Mahasiswa::find($id);
        $pengguna = $mahasiswa->pengguna;
        $mahasiswa->nama = $input->nama;
        $mahasiswa->nim = $input->nim;
        $mahasiswa->alamat = $input->alamat;
        $mahasiswa->pengguna_id = $input->pengguna_id;
        if(!is_null($input->username)){
            $pengguna = $mahasiswa->pengguna->fill($input->only('username'));
                if(!empty($input->password)) $pengguna->password = $input->password;
                if($pengguna->save()) $this->informasi = 'Berhasil simpan data';
        }
        else{
            $this->informasi = 'Gagal Simpan Data';
        }
        // $informasi = $mahasiswa->save() ? 'Berhasil update data': 'Gagal update data';
        return redirect ('mahasiswa') -> with (['informasi'=>$this->informasi]);
    }
    public function hapus($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa->pengguna()->delete()){
            if($mahasiswa->delete()) $this->informasi = 'Berhasil hapus data';
        }
        $informasi = $mahasiswa->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        return redirect('mahasiswa')-> with(['informasi'=>$this->informasi]);
    }
}


