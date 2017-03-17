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

Route::get('Mahasiswa/tambah','Mahasiswacontroller@tambah');
Route::get('Mahasiswa','Mahasiswacontroller@awal');

Route::get('Matakuliah/tambah','Matakuliahcontroller@tambah');
Route::get('Matakuliah','Matakuliahcontroller@awal');

Route::get('Ruangan/tambah','Ruangancontroller@tambah');
Route::get('Ruangan','Ruangancontroller@awal');

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
