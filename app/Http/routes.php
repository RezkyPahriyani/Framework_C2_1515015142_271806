<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('pengguna/tambah','penggunacontroller@tambah');
Route::get('pengguna','penggunacontroller@awal');
Route::get('pengguna/{pengguna}','penggunacontroller@lihat');
Route::post('pengguna/simpan','penggunacontroller@simpan');
Route::get('pengguna/edit/{pengguna}','penggunacontroller@edit');
Route::post('pengguna/edit/{pengguna}','penggunacontroller@update');
Route::get('pengguna/hapus/{pengguna}','penggunacontroller@hapus');

Route::get('Mahasiswa/tambah','Mahasiswacontroller@tambah');
Route::get('Mahasiswa','Mahasiswacontroller@awal');

Route::get('Matakuliah/tambah','Matakuliahcontroller@tambah');
Route::get('Matakuliah','Matakuliahcontroller@awal');
Route::get('Matakuliah/{Matakuliah}','Matakuliahcontroller@lihat');
Route::post('Matakuliah/simpan','Matakuliahcontroller@simpan');
Route::get('Matakuliah/edit/{Matakuliah}','Matakuliahcontroller@edit');
Route::post('Matakuliah/edit/{Matakuliah}','Matakuliahcontroller@update');
Route::get('Matakuliah/hapus/{Matakuliah}','Matakuliahcontroller@hapus');

Route::get('Ruangan/tambah','Ruangancontroller@tambah');
Route::get('Ruangan','Ruangancontroller@awal');
Route::post('Ruangan/simpan','Ruangancontroller@simpan');
Route::get('Ruangan/edit/{Ruangan}','Ruangancontroller@edit');
Route::post('Ruangan/edit/{Ruangan}','Ruangancontroller@update');
Route::get('Ruangan/hapus/{Ruangan}','Ruangancontroller@hapus');

Route::get('Dosen/tambah','Dosencontroller@tambah');
Route::get('Dosen','Dosencontroller@awal');

Route::get('Dosen_matakuliah/tambah','Dosen_matakuliahcontroller@tambah');
Route::get('Dosen_matakuliah','Dosen_matakuliahcontroller@awal');

Route::get('Jadwal_matakuliah/tambah','Jadwal_matakuliahcontroller@tambah');
Route::get('Jadwal_matakuliah','Jadwal_matakuliahcontroller@awal');

Route::get('/', function () {
	return view('welcome');
});
Route::get('/public', function () {
	return view('postest1');
});

Route::get('pengguna/{pengguna}', function ($pengguna) {
    return "hello world dari pengguna $pengguna";
});
