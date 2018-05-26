@extends('layout.app')

@section('title')
	Booking
@endsection

@section('content')
	<h1>Book Form</h1>
	@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
	@endif
		<li>yang belum solved
			<ul>date ga bisa ngetag kemarin dr front end(kalo  back end bisa nolak)</ul>
			<ul>waktu cuma bisa rentang 6.30 - 22.30</ul>
			<ul>ngecek user exists tapi beda no hp trs jadinya ke update</ul>
		</li>
	{!! Form::open(['action' => 'TableController@storePeminjamBooking','method'=>'POST','enctype' => 'multipart/form-data','autocomplete'=>'off']) !!}
		{{csrf_field()}}
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
		{{ Form::select('kegiatan_id',[''=>'','1'=>'Kuliah','2'=>'Praktikum','3'=>'Asistensi/Sesi Lab', '4'=>'Seminar','5'=>'Pelatihan/Workshop', '6'=>'Kuliah Tamu','7'=>'Perlombaan','8'=>'Kelas Pengganti','9'=>'Kegiatan Lain-Lain Himpunan','10'=>'Kegiatan Lain-Lain Bem Fakultas','11'=>'Kegiatan Lain-Lain BSO Informatika']) }}
		@if( $errors->has('kegiatan_id') ? ' has-error' : '' )
    		<strong>{{ $errors->first('kegiatan_id') }}</strong>
    	@endif

    	<br>
		{{Form::label('tempat_id', 'Ruangan')}}
		{{ Form::select('tempat_id',[''=>'','1'=>'IF-101','2'=>'IF-102','3'=>'IF-103','4'=>'IF-104','5'=>'IF-105a','6'=>'IF105-b','7'=>'IF-106','8'=>'IF-108','9'=>'Plaza Mahasiswa','10'=>'Plaza Lama 1','11'=>'Plaza Lama 2','12'=>'Plaza Baru 1','13'=>'Plaza Baru 2', '14'=>'Lapangan','15'=>'Aula Informatika','16'=>'LP','17'=>'LP2']) }}
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

@endsection