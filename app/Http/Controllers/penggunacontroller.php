<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pengguna;

class penggunacontroller extends Controller
{
    //
	public function awal()
	/*{
		return "Hello dari penggunacontroller";
	}
	public function tambah()
	{
		return $this->simpan();
	}
	public function simpan()
	{
		$pengguna = new pengguna();
		$pengguna->username = "jon_doe";
		$pengguna->password = "doe_jon";
		$pengguna->save();
		return "data dengan username {$pengguna->username} telah disimpan";
	} */
	{
		return view('pengguna.awal',['data'=>pengguna::all()]);
	}
	public function tambah()
	{
		return view('pengguna.tambah');
	}
	public function simpan(Requests $input)
	{
		$pengguna = new pengguna;
		$pengguna->username = $input->username;
		$pengguna->password = $input->password;
		$informasi = $pengguna->save() ? 'Berhasil Simpan Data' : 'Gagal Simpan Data';
		return redirect('pengguna')->with(['Informasi'=>$Informasi]);
	}
	public function edit($id)
	{
		$pengguna = pengguna::find($id);
		return view ('pengguna.edit')->with(array('pengguna' => $pengguna ));
	}
	public function lihat($id)
	{
		$pengguna = pengguna::find($id);
		return view ('pengguna.lihat')->with(array('pengguna' => $pengguna ));
	}
	public function update($id, Requests $input)
	{
		$pengguna = pengguna::find($id);
		$pengguna-> username = $input->username;
		$pengguna-> password = $input->password;
		$Informasi = $pengguna->save() ? 'Berhasil Update Data' : 'Gagal Update Data';
		return redirect('pengguna')->with (['Informasi'=>$Informasi]);
	}
	public function hapus($id)
	{
		$pengguna = pengguna::find($id);
		$Informasi = $pengguna->delete() ? 'Berhasil Hapus Data' : 'Gagal Hapus Data';
		return redirect('pengguna')->(['Informasi'=>$Informasi]);
	}
}
