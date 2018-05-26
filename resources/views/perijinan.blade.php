@extends('layout.app')

@section('title')
	Upload Perijinan
@endsection

@section('content')

	@if(session()->has('message'))
	    <div class="alert alert-success">
	    	<p>Upload perijinan dengan token berikut:</p>
	        {{ session()->get('message') }}
	    </div>
	@endif   
	<li>To DO list
		<ul>randomizenya unique buat btoken</ul>
		<ul>NRP + BTOKEN Exist -> bisa akses halaman upload</ul>
		<ul>dari halaman /confirm/check ngepassing id booking buat masukin gambar ke db</ul>  
	</li>

	<h1>Masukkan NRP dan Token Anda</h1>

	
	{!! Form::open(['action' => 'TableController@awalUploadSurjin','method'=>'POST','enctype' => 'multipart/form-data','autocomplete'=>'off']) !!}
		{{csrf_field()}}
		<!--
    	{{Form::label('nrp_nip', 'NRP')}}
    	{{Form::text('nrp_nip')}}
    	@if( $errors->has('nrp_nip') ? ' has-error' : '' )
    		<strong>{{ $errors->first('nrp_nip') }}</strong>
    	@endif -->
    	<!--bisa dispecifying htmlnya, liat dokumentasi laracollective ae-->

    	<br>
    	{{Form::label('btoken', 'Token')}}
		{{Form::text('btoken')}}
		@if( $errors->has('btoken') ? ' has-error' : '' )
    		<strong>{{ $errors->first('btoken') }}</strong>
    	@endif 

		<br>
		{{Form::submit('Submit')}}
	{!! Form::close() !!}
@endsection