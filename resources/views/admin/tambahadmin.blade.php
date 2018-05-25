@extends('layout.app')

@section('title')
	Add New Admin
@endsection

@section('content')
	<h1>Form Tambah Admin</h1>
	<!--@if(count($errors)>0)
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif-->
	{!! Form::open(['action' => 'TableController@storeUser','method'=>'POST','enctype' => 'multipart/form-data','autocomplete'=>'off']) !!}
	
    	{{Form::label('name', 'Name')}}
    	{{Form::text('name')}} 
    	@if( $errors->has('name') ? ' has-error' : '' )
    		<strong>{{ $errors->first('name') }}</strong>
    	@endif
    	<!--bisa dispecifying htmlnya, liat dokumentasi laracollective ae-->

    	<br>
    	{{Form::label('username', 'Username')}}
		{{Form::text('username')}}
		@if( $errors->has('username') ? ' has-error' : '' )
    		<strong>{{ $errors->first('username') }}</strong>
    	@endif
		
		<br>
		{{Form::label('password', 'Password')}}
		{{ Form::password('password', array('class' => 'form-control')) }}
		@if( $errors->has('password') ? ' has-error' : '' )
    		<strong>{{ $errors->first('password') }}</strong>
    	@endif
		
		<br>
		{{Form::label('cpassword', 'Confirm Password')}}
		<input name="password_confirmation" type="password" class="form-control" value="" id="password_confirmation"/>

		<br>
		{{Form::submit('Submit')}}
	{!! Form::close() !!}
@endsection