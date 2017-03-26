<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dosen;
use App\pengguna;

class Dosencontroller extends Controller
{
    //
    public function awal()
    {
    	/*return "Hello dari Dosencontroller"; */
        protected $informasi = 'Gagal melakukan aksi'; //
    public function awal()
    {
        $semuaDosen = Dosen::all();//
        return view('dosen.awal', compact('semuaDosen'));
    }
    public function tambah()
    {
    	/*return $this->simpan();*/
         return view('dosen.tambah');
    }
    public function simpan()
    {
    	/*$dosen = new Dosen();
    	$dosen -> nama = "Rezky pahriyani";
    	$dosen -> nip = "1515015142";
    	$dosen -> alamat = "monginsidi";
    	$dosen -> pengguna_id = 1;

    	$dosen -> save();
    	return "Data dengan nama {$dosen->nama} Telah Disimpan";
    */
        $pengguna = new Pengguna($input->only('username','password'));
            if ($pengguna->save()) {
                $dosen = new Dosen;
                $dosen->nama = $input->nama;
                $dosen->nip = $input->nip;
                $dosen->alamat = $input->alamat;
                if($pengguna->dosen()->save($dosen)) $this->informasi='Berhasil simpan data';
            }        
        return redirect ('dosen')->with(['informasi'=>$this->informasi]);
    }

}

    public function edit($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.edit')-> with(array('dosen'=>$dosen));
    }

    public function lihat($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.lihat')->with(array('dosen'=>$dosen));
    }

    public function update($id, Request $input)
    {
        $dosen = Dosen::find($id);
        $dosen->nama = $input->nama;
        $dosen->nip = $input->nip;
        $dosen->alamat = $input->alamat;
        $dosen->pengguna_id = $input->pengguna_id;
        if(!is_null($input->username)){
            $pengguna = $dosen->pengguna->fill($input->only('username'));
                if(!empty($input->password)) $pengguna->password = $input->password;
                if($pengguna->save()) $this->informasi = 'Berhasil simpan data';
        }
        else{
            $this->informasi = 'Berhasil simpan data';
        }
        return redirect ('dosen') -> with (['informasi'=>$this->informasi]);
        // $informasi = $dosen->save() ? 'Berhasil update data': 'Gagal update data';
        // return redirect ('dosen') -> with (['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $dosen = Dosen::find($id);
        if($dosen->pengguna()->delete()){
            if($dosen->delete()) $this->informasi = 'Berhasil hapus data';
        }
        return redirect('dosen')-> with(['informasi'=>$this->informasi]);
        // $informasi = $dosen->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        // return redirect('dosen')-> with(['informasi'=>$informasi]);
    }
}
