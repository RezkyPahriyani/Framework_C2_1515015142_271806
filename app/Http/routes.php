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
// Route::get('pengguna','Penggunacontroller@awal');
// Route::get('pengguna/{Pengguna}','Penggunacontroller@lihat');
// Route::get('pengguna/lihat/{pengguna}', 'Penggunacontroller@lihat');
// Route::post('pengguna/simpan', 'Penggunacontroller@simpan');
// Route::get('pengguna/edit/{pengguna}', 'Penggunacontroller@edit');
// Route::post('pengguna/edit/{pengguna}', 'Penggunacontroller@update');
// Route::get('pengguna/hapus/{pengguna}', 'Penggunacontroller@hapus');


// Route::get('Mahasiswa','Mahasiswacontroller@awal');
// Route::get('Mahasiswa/tambah','Mahasiswacontroller@tambah');
// Route::get('Mahasiswa/simpan','Mahasiswacontroller@simpan');

// Route::get('Matakuliah/{matakuliah}','Matakuliahcontroller@lihat');
// Route::get('Matakuliah','Matakuliahcontroller@awal');
// Route::get('Matakuliah/tambah','Matakuliahcontroller@tambah');
// Route::post('Matakuliah/simpan','Matakuliahcontroller@simpan');
// Route::get('Matakuliah/edit/{Matakuliah}','Matakuliahcontroller@edit');
// Route::post('Matakuliah/edit/{Matakuliah}','Matakuliahcontroller@update');
// Route::get('Matakuliah/hapus/{Matakuliah}','Matakuliahcontroller@hapus');

// Route::get('Ruangan','Ruangancontroller@awal');
// Route::get('Ruangan/tambah','Ruangancontroller@tambah');
// Route::post('Ruangan/simpan','Ruangancontroller@simpan');
// Route::get('Ruangan/edit/{Ruangan}','Ruangancontroller@edit');
// Route::post('Ruangan/edit/{Ruangan}','Ruangancontroller@update');
// Route::get('Ruangan/hapus/{Ruangan}','Ruangancontroller@hapus');


// Route::get('Dosen','Dosencontroller@awal');
// Route::get('Dosen/tambah','Dosencontroller@tambah');

// Route::get('Dosen_Matakuliah','Dosen_Matakuliahcontroller@awal');
// Route::get('Dosen_Matakuliah/tambah','Dosen_Matakuliahcontroller@tambah');

// Route::get('Jadwal_Matakuliah','Jadwal_Matakuliahcontroller@awal');
// Route::get('Jadwal_Matakuliah/tambah','Jadwal_Matakuliahcontroller@tambah');

// Route::get('/', function(){
// 	return view('master');
// });

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/public', function () {
//     return ('Muhamad Rezki Pahriyani');
// });

// Route::get('pengguna/{pengguna}',function ($pengguna)
// {
// 	return "Hallo World dari pengguna $pengguna";
// });


Route::get('/', function () {
    return view ('master');
});

Route::get('/',function()
{
	return \App\Dosen_Matakuliah::whereHas('dosen',function($query)
	{
		$query->where('nama','like','%s%');
	})->with('dosen')->groupBy('dosen_id')->get();
});
Route::get('/',function()
{
	return \App\Dosen_Matakuliah::whereHas('dosen',function($query)
	{
		$query->where('nama','like','%s%');
	})
	->orWhereHas('matakuliah', function ($kueri)
	{
		$kueri->where('title','like','%a%');		
	})
	->with('dosen','matakuliah')
	->groupBy('dosen_id')
	->get();
});

Route::get('ujiDoesntHave','RelationshipReborncontroller@ujiDoesntHave');
Route::get('ujiHas','RelationshipReborncontroller@ujiHas');



Route::get('/', function(Illuminate\Http\Request $request){
	echo "ini adalah request dari method get ". $request -> nama;
});

use Illuminate\Http\Request;
Route::get('/', function (){
	echo Form::open(['url'=>'/']).
			Form::label('nama').
			Form::text('nama',null).
			Form::submit('kirim').
			Form::close();
});
Route::post('/', function (Request $request){
	echo "Hasil dari form input tadi nama :". $request -> nama;
});
Route::get('/login','Sesicontroller@form');
Route::post('/login','Sesicontroller@validasi');
Route::get('/logout','Sesicontroller@logout');
Route::get('/','Sesicontroller@index');

Route::group(['middleware'=>'AutentifikasiUser'], function(){
	// -------------------------------------------

Route::get('/pengguna', 'Penggunacontroller@awal');

Route::get('/pengguna/tambah', 'Penggunacontroller@tambah');

//------------------------------------------------------------------

Route::get('/dosen', 'Dosencontroller@awal');

Route::get('dosen/tambah', 'Dosencontroller@tambah');

//------------------------------------------------------------------

Route::get('/mahasiswa', 'Mahasiswacontroller@awal');

Route::get('/mahasiswa/tambah', 'Mahasiswacontroller@tambah');

Route::get('/mahasiswa/tambah/route', function(){
		$mahasiswa = new App\Mahasiswa();
        $mahasiswa->nama = 'Muhamad Rezki Pahriyani';
        $mahasiswa->nim = '1515015142';
        $mahasiswa->alamat = 'Jl. Monginsidi';
        $mahasiswa->pengguna_id = 1;
        $mahasiswa->save();
        return "Telah disave {$mahasiswa->nama} ke dalam databas";
});

//------------------------------------------------------------------

Route::get('/ruangan', 'Ruangancontroller@awal');

Route::get('/ruangan/tambah', 'Ruangancontroller@tambah');

//------------------------------------------------------------------

Route::get('/matakuliah', 'Matakuliahcontroller@awal');

Route::get('/matakuliah/tambah', 'Matakuliahcontroller@tambah');

//------------------------------------------------------------------

Route::get('/dosen_matakuliah', 'Dosen_matakuliahcontroller@awal');

Route::get('/dosen_matakuliah/tambah', 'Dosen_Matakuliahcontroller@tambah');

//------------------------------------------------------------------

Route::get('/jadwal_matakuliah', 'Jadwal_matakuliahcontroller@awal');

Route::get('/jadwal_matakuliah/tambah', 'Jadwal_matakuliahcontroller@tambah');

//------------------------------------------------------------------

Route::get('pengguna/lihat/{pengguna}', 'Penggunacontroller@lihat');
Route::post('pengguna/simpan', 'Penggunacontroller@simpan');
Route::get('pengguna/edit/{pengguna}', 'Penggunacontroller@edit');
Route::post('pengguna/edit/{pengguna}', 'Penggunacontroller@update');
Route::get('pengguna/hapus/{pengguna}', 'Penggunacontroller@hapus');

//------------------------------------------------------------------

Route::get('matakuliah/lihat/{matakuliah}', 'Matakuliahcontroller@lihat');
Route::post('matakuliah/simpan', 'Matakuliahcontroller@simpan');
Route::get('matakuliah/edit/{matakuliah}', 'Matakuliahcontroller@edit');
Route::post('matakuliah/edit/{matakuliah}', 'Matakuliahcontroller@update');
Route::get('matakuliah/hapus/{matakuliah}', 'Matakuliahcontroller@hapus');

//------------------------------------------------------------------

Route::get('ruangan/lihat/{ruangan}', 'Ruangancontroller@lihat');
Route::post('ruangan/simpan', 'Ruangancontroller@simpan');
Route::get('ruangan/edit/{ruangan}', 'Ruangancontroller@edit');
Route::post('ruangan/edit/{ruangan}', 'Ruangancontroller@update');
Route::get('ruangan/hapus/{ruangan}', 'Ruangancontroller@hapus');

//------------------------------------------------------------------

Route::get('mahasiswa/lihat/{mahasiswa}', 'Mahasiswacontroller@lihat');
Route::post('mahasiswa/simpan', 'Mahasiswacontroller@simpan');
Route::get('mahasiswa/edit/{mahasiswa}', 'Mahasiswacontroller@edit');
Route::post('mahasiswa/edit/{mahasiswa}', 'Mahasiswacontroller@update');
Route::get('mahasiswa/hapus/{mahasiswa}', 'Mahasiswacontroller@hapus');

//------------------------------------------------------------------

Route::get('dosen/lihat/{dosen}', 'Dosencontroller@lihat');
Route::post('dosen/simpan', 'Dosencontroller@simpan');
Route::get('dosen/edit/{dosen}', 'Dosencontroller@edit');
Route::post('dosen/edit/{dosen}', 'Dosencontroller@update');
Route::get('dosen/hapus/{dosen}', 'Dosencontroller@hapus');

//------------------------------------------------------------------

Route::get('dosen_matakuliah/lihat/{dosen_matakuliah}', 'Dosen_matakuliahcontroller@lihat');
Route::post('dosen_matakuliah/simpan', 'Dosen_matakuliahcontroller@tambah');
Route::get('dosen_matakuliah/edit/{dosen_matakuliah}', 'Dosen_matakuliahcontroller@edit');
Route::post('dosen_matakuliah/edit/{dosen_matakuliah}', 'Dosen_matakuliahcontroller@update');
Route::get('dosen_matakuliah/hapus/{dosen_matakuliah}', 'Dosen_matakuliahcontroller@hapus');

//------------------------------------------------------------------

Route::get('jadwal_matakuliah/{jadwal_matakuliah}', 'Jadwal_matakuliahcontroller@lihat');
Route::post('jadwal_matakuliah/simpan', 'Jadwal_matakuliahcontroller@simpan');
Route::get('jadwal_matakuliah/edit/{jadwal_matakuliah}', 'Jadwal_matakuliahcontroller@edit');
Route::post('jadwal_matakuliah/edit/{jadwal_matakuliah}', 'Jadwal_matakuliahcontroller@update');
Route::get('jadwal_matakuliah/hapus/{jadwal_matakuliah}', 'Jadwal_matakuliahcontroller@hapus');
});