@extends('layout.app')

@section('title')
	NgeAccept
@endsection

@section('style')
	table {
	  width: 50%;
	  margin: auto;
	  background-color: black(0.5)
	}

	table, th, td {
	    border: 5px solid white;
	    border-collapse: collapse;
	  font-size: 1em; 
	}
	th, td {
	    padding: 10px;
	    text-align: center;
	}

	th{
	  background-color: white;
	  color:black;
	}
@endsection

@section('content')
	<h1>Booking List</h1>

	@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
	@endif

	@if(count($bookings)>0)
		<table>	
			<tr>
				<th>Nama Event</th>
				<th>Tempat</th>
				<th>Jenis Kegiatan</th>
				<th>Date</th>
				<th>Time Start</th>
				<th>Time End</th>
				<th>NRP</th>
				<th>Nama Pemesan</th>
				<th>Nomor HP Pemesan</th>
				<th>Surat Ijin</th>
				<th>Status</th>
			</tr>
			
				@foreach($bookings as $booking)

					<tr>
						<th>{{$booking->namabooking}}</th>
						<th>{{$booking->tempat->namatempat}}</th>
						<th>{{$booking->kegiatan->namakegiatan}}</th>
						<th>{{$booking->dateevent}}</th>
						<th>{{$booking->start_time}}</th>
						<th>{{$booking->end_time}}</th>
						<th>{{$booking->peminjam->nrp_nip}}</th>
						<th>{{$booking->peminjam->namapeminjam}}</th>
						<th>{{$booking->peminjam->nohp_peminjam}}</th>
						<th>@if(is_null($booking['image']))
							null
							@else<button id="button{{$booking->id}}">Show</button>
							@endif
						</th>
						<th><form action="/verify/{{$booking->id}}" input="hidden" method="post">{{csrf_field()}}<button value="1" name="action" >Accept</button>
							<button value="-1" name="action">Reject</button></form></th>
					</tr>

				@endforeach	
		</table>
		@foreach($bookings as $booking)
		<div class="hehe" id="{{$booking->id}}" style= "display:none;">
				<p >{{$booking->namaevent}}</p>
				<img src="{{ url('storage/images/'.$booking->id .".jpg")}}" alt="" title="" />
			</div>
		</div>

		@endforeach
	@endif
@endsection

@section('script')
	@foreach($bookings as $booking)
		$(document).ready(function(){
    			$("#button{{$booking->id}}").click(function(){
    				$(".hehe").hide();
    	    		$("#{{$booking->id}}").show();
    			});
			});
	@endforeach
@endsection