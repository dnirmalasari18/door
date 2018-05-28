@extends('layout.app')

@section('title')
	Upload Perijinan
@endsection

@section('content')

	@if(session()->has('key'))
	    <div class="alert alert-success">
	        {{ session()->get('key') }}
	    </div>

	@endif   

	<h1>Upload Foto</h1>

	
	{!! Form::open(['action' => 'TableController@uploadSurjin','method'=>'POST','enctype' => 'multipart/form-data','autocomplete'=>'off']) !!}
		{{csrf_field()}}
		
		{{Form::label('image', 'Surat Perizinan(max 10 mb)')}}
		{{ Form::file('image') }}
		@if( $errors->has('image') ? ' has-error' : '' )
    		<strong>{{ $errors->first('image') }}</strong>
    	@endif

		<br>
		{{Form::submit('Submit')}}
	{!! Form::close() !!}
@endsection