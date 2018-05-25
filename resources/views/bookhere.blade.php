@extends('layout.app')

@section('title')
	Booking
@endsection

@section('content')
	<h1>Book Form</h1>
		<li>yang belum solved
			<ul>date ga bisa ngetag kemarin dr front end(kalo  back end bisa nolak)</ul>
			<ul>waktu cuma bisa rentang 6.30 - 22.30</ul>
			<ul>nama kok ga bisa 1 kata ya? kudu ada spasi</ul>
			<ul>tempat, kegiatan belum semua dimasukin di select</ul>
			<ul>ngecek user exists</ul>
		</li>
	{!! Form::open(['action' => 'TableController@storePeminjamBooking','method'=>'POST','enctype' => 'multipart/form-data','autocomplete'=>'off']) !!}

		{{Form::label('namapeminjam', 'Name')}}
    	{{Form::text('namapeminjam')}} 
    	@if( $errors->has('namapeminjam') ? ' has-error' : '' )
    		<strong>{{ $errors->first('namapeminjam') }}</strong>
    	@endif
    	<!--bisa dispecifying htmlnya, liat dokumentasi laracollective ae-->

    	<br>
    	{{Form::label('rolepeminjam_id', 'Role')}}
		{{Form::select('rolepeminjam_id',[''=>'','1'=>'Dosen','2'=> 'Mahasiswa'])}}
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
		{{Form::label('kegiatan_id', 'Tipe Kegiatan')}}
		{{ Form::select('kegiatan_id',[''=>'','1'=>'Kuliah','2'=>'Praktikum']) }}
		@if( $errors->has('kegiatan_id') ? ' has-error' : '' )
    		<strong>{{ $errors->first('kegiatan_id') }}</strong>
    	@endif

    	<br>
		{{Form::label('tempat_id', 'Ruangan')}}
		{{ Form::select('tempat_id',[''=>'','1'=>'IF-101','16'=>'LP'],' ') }}
		@if( $errors->has('tempat_id') ? ' has-error' : '' )
    		<strong>{!! $errors->first('tempat_id') !!}</strong>
    	@endif

    	<br>
		{{Form::label('namabooking', 'Nama Kegiatan')}}
		{{ Form::text('namabooking') }}
		@if( $errors->has('namabooking') ? ' has-error' : '' )
    		<strong>{{ $errors->first('namabooking') }}</strong>
    	@endif

    	<br>
		{{Form::label('dateevent', 'Tanggal',array('id'=>'date','min'=>'06/20/2018'))}}
		{{ Form::date('dateevent')}}
		@if( $errors->has('dateevent') ? ' has-error' : '' )
    		<strong>{{ $errors->first('dateevent') }}</strong>
    	@endif
    	

    	<br>
		{{Form::label('start_time', 'Start Time',array('min'=>'06.30'))}}
		{{ Form::time('start_time')}}
		@if( $errors->has('start_time') ? ' has-error' : '' )
    		<strong>{{ $errors->first('start_time') }}</strong>
    	@endif
    	
    	<br>
		{{Form::label('end_time', 'End Time')}}
		{{ Form::time('end_time') }}
		@if( $errors->has('end_time') ? ' has-error' : '' )
    		<strong>{{ $errors->first('end_time') }}</strong>
    	@endif


		<br>
		{{Form::submit('Submit')}}
	{!! Form::close() !!}

@endsection

@section('script')
$('#date').datepicker({ dateFormat: 'mm/dd/yyyy' }).val();
<!--	var d = new Date();
	document.getElementById("demo").min = d;

	function myFunction() {
    	var x = document.getElementById("myTime").max = "22:30";
    	document.getElementById("demo").innerHTML = "You can't book it.";
}-->
@endsection