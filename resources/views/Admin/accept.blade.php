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
	<table>	
		<tr>
			<th>Nama Event</th>
			<th>Tempat</th>
			<th>Jenis Kegiatan</th>
			<th>Date</th>
			<th>Time Start</th>
			<th>Time End</th>
			<th>Perulangan</th>
			<th>NRP</th>
			<th>Nama Pemesan</th>
			<th>Nomor HP Pemesan</th>
			<th>Surat Ijin</th>
			<th>Status</th>
		</tr>
		@if(count($bookings)>0)
			@foreach($bookings as $booking)
				<!--@if($booking['status_id']==1)-->
					<tr>
						<th>{{$booking->namabooking}}</th>
						<th>{{$booking->kegiatan->namakegiatan}}</th>
						<th>{{$booking->tempat->namatempat}}</th>
						<th>{{$booking->dateevent}}</th>
						<th>{{$booking->start_time}}</th>
						<th>{{$booking->end_time}}</th>
						<th></th>
						<th>{{$booking->peminjam->nrp_nip}}</th>
						<th>{{$booking->peminjam->namapeminjam}}</th>
						<th>{{$booking->peminjam->nohp_peminjam}}</th>
						<th><button>Show</button></th>
						<th><form action="/verify/{{$booking->id}}" input="hidden" method="post">{{csrf_field()}}<button value="1" name="action" >Accept</button>
							<button value="-1" name="action">Reject</button></form></th>
					</tr>
				<!--@endif-->
			@endforeach
		@endif
	</table>
@endsection