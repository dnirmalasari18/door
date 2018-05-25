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
			<div class="hehe" id="{{$tempat->id}}" style= "display:none;">
				<p >This id is {{$tempat->id}}</p>
				<table>	
				<tr>
					<th>Nama Event</th>
					<th>Tempat</th>
					<th>Jenis Kegiatan</th>
					<th>Date</th>
					<th>Time Start</th>
					<th>Time End</th>
					<th>Status</th>
				</tr>
				@if(count($bookings)>1)
					@foreach($bookings as $booking)
						@if($booking['tempat_id']==$tempat['id'] && $booking['status_id']!=3 && $booking['dateevent'])
						<tr>
							<th>{{$booking->namabooking}}</th>
							<th>{{$booking->kegiatan->namakegiatan}}</th>
							<th>{{$booking->tempat->namatempat}}</th>
							<th>{{$booking->dateevent}}</th>
							<th>{{$booking->start_time}}</th>
							<th>{{$booking->end_time}}</th>
							<th>{{$booking->status->namastatus}}</th>
						</tr>
						@endif
					@endforeach

				@endif
				</table>
			</div>
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