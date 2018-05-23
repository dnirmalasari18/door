@extends('layout.app')

@section('title')
	Add New Admin
@endsection

@section('content')
	<h1>Form Tambah Admin</h1>
	{!! Form::open(['action' => 'TableController@storeUser','method'=>'POST','enctype' => 'multipart/form-data']) !!}
    	{{Form::label('name', 'Name')}}
    	{{Form::text('name')}} 
    	<!--bisa dispecifying htmlnya, liat dokumentasi laracollective ae-->
    	{{Form::label('username', 'Username')}}
		{{Form::text('username')}}

		{{Form::label('password', 'Password')}}
		{{ Form::password('password', array('class' => 'form-control')) }}
		{{Form::submit('Submit')}}
	{!! Form::close() !!}
@endsection