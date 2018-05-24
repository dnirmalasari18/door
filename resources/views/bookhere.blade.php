@extends('layout.app')

@section('title')
	Booking
@endsection

@section('content')
	<h1>Book Form</h1>
	Date (gimana cara biar ga bisa ngetag tanggal kemaren2?)
	Time (ga ngetag di atas jam 10.30 malam sebelum jam 6 pagi)
	((kalo bisa repeat, ada occurences))
	nama kegiatan
	kategori
	deskripsi
	nama pemesan
	nrp_nip
	role ((kalo bisa dosen auto accepted))
	no_hp
	{!! Form::open(['action' => 'TableController@storePeminjam','method'=>'POST','enctype' => 'multipart/form-data']) !!}

		{{Form::label('namapeminjam', 'Name')}}
    	{{Form::text('namapeminjam')}} 
    	@if( $errors->has('namapeminjam') ? ' has-error' : '' )
    		<strong>{{ $errors->first('namapeminjam') }}</strong>
    	@endif
    	<!--bisa dispecifying htmlnya, liat dokumentasi laracollective ae-->

    	<br>
    	{{Form::label('rolepeminjam_id', 'Role')}}
		{{Form::select('rolepeminjam_id',['1'=>'Dosen','2'=> 'Himpunan','3'=>'BEM Fakultas','4'=>'BSO TC'])}}
		@if( $errors->has('rolepeminjam_id') ? ' has-error' : '' )
    		<strong>{{ $errors->first('rolepeminjam_id') }}</strong>
    	@endif
		
		<br>
		{{Form::label('nrp_nip', 'NRP/NIP')}}
		{{ Form::text('nrp_nip') }}
		@if( $errors->has('nrp_nip') ? ' has-error' : '' )
    		<strong>{{ $errors->first('nrp_nip') }}</strong>
    	@endif
		
		<br>
		{{Form::label('nohp_peminjam', 'No. Handphone')}}
		{{ Form::text('nohp_peminjam') }}
		@if( $errors->has('nohp_peminjam') ? ' has-error' : '' )
    		<strong>{{ $errors->first('nohp_peminjam') }}</strong>
    	@endif
    	

		<br>
		{{Form::submit('Submit')}}
	{!! Form::close() !!}



@endsection