@extends('layout.app')

@section('title')
	Jadwal
@endsection


@section('content')
	<h1>Jadwal Page</h1>

	@if(count($tempats)>0)
		@foreach($tempats as $tempat)
			@if($tempat['id']<16)
				<button id="button{{$tempat->id}}" >{{$tempat->namatempat}}</button>
			@elseif($tempat['id']===16)
				<a target= "blank" href="http://reservasi.lp.if.its.ac.id"><button>{{$tempat->namatempat}}</button></a>
			@elseif($tempat['id']===17)
				<a target="blank" href="http://reservasi.lp2.if.its.ac.id"><button>{{$tempat->namatempat}}</button></a>
			@endif
		@endforeach
		<br>

		@foreach($tempats as $tempat)
			@if($tempat['id']<16)
				<p class="hehe" id="{{$tempat->id}}" style= "display:none;">This id is {{$tempat->id}}</p>
			@endif
		@endforeach

	@else
		<p>No data found</p>
	@endif
@endsection

@section('script')
	@foreach($tempats as $tempat)
		@if($tempat['id']<16)
			$(document).ready(function(){
    			$("#button{{$tempat->id}}").click(function(){
    				$(".hehe").hide();
    	    		$("#{{$tempat->id}}").show();
    			});
			});
		@endif
	@endforeach
@endsection