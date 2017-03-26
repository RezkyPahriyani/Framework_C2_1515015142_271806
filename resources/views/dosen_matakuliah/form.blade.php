<div class="form-group">
	<label class="col-sm-2 control-label" id="dosen_id">Nama Dosen</label>
	<div class="col-sm-10">
		{!! Form::select('dosen_id',$dosen->listDosenDanNim(),null,['class'=>'form-control','id=>dosen_id','placeholder'=>"Dosen"]) !!}	
	</div>
</div>

<!-- <div class="form-group">
	<label class="col-sm-2 control-label">NIP</label>
	<div class="col-sm-10">
		{!! Form::text('nip',null,['class'=>'form-control','placeholder'=>"Masukan nip dosen"]) !!}	
	</div>
</div> -->

<div class="form-group">
	<label class="col-sm-2 control-label">Matakuliah</label>
	<div class="col-sm-10">
		{!! Form::select('matakuliah_id',$matakuliah->lists('title','id'),null,['class'=>'form-control','id'=>'matakuliah_id','placeholder'=>"Matakuliah"]) !!}	
	</div>
</div>

<!-- <div class="form-group">
	<label class="col-sm-2 control-label">Alamat</label>
	<div class="col-sm-10">
		{!! Form::text('alamat',null,['class'=>'form-control','placeholder'=>"Masukan alamat dosen"]) !!}	
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">ID Pengguna</label>
	<div class="col-sm-10">
		{!! Form::text('pengguna_id',null,['class'=>'form-control','placeholder'=>"Masukan id pengguna dari dosen"]) !!}	
	</div>
</div> -->

<!-- 
$dosen->nama = $input->nama;
    	$dosen->nip = $input->nip;
    	$dosen->alamat = $input->alamat;
    	$dosen->pengguna_id = $input->pengguna_id; -->