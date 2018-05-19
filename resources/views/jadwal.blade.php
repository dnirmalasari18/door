@extends('layout.app')

@section('title')
	Jadwal
@endsection

@section('content')
	<h1>Jadwal Page</h1>

	@if(count($tempats)>0)
		@foreach($tempats as $tempat)
			<button id="hehe" >{{$tempat->namatempat}}</button>
			<p id="{{$tempat->namatempat}}">This id is {{$tempat->id}}</p>
		@endforeach
	@else
		<p>No data found</p>
	@endif
@endsection

@section('script')
	$(document).ready(function(){
    	$("#hehe").click(function(){
        	$("p").toggle();
    	});
	});
@endsection