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
	.modal {
	    display: none; /* Hidden by default */
	    position: fixed; /* Stay in place */
	    z-index: 1; /* Sit on top */
	    padding-top: 100px; /* Location of the box */
	    left: 0;
	    top: 0;
	    width: 100%; /* Full width */
	    height: 100%; /* Full height */
	    overflow: auto; /* Enable scroll if needed */
	    background-color: rgb(0,0,0); /* Fallback color */
	    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
	    background-color: #fefefe;
	    margin: auto;
	    padding: 20px;
	    border: 1px solid #888;
	    width: 80%;
	}

	/* The Close Button */
	.close {
	    color: #aaaaaa;
	    float: right;
	    font-size: 28px;
	    font-weight: bold;
	}

	.close:hover,
	.close:focus {
	    color: #000;
	    text-decoration: none;
	    cursor: pointer;
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
						<th>{{$booking->tempat->namatempat}}</th>
						<th>{{$booking->kegiatan->namakegiatan}}</th>
						<th>{{$booking->dateevent}}</th>
						<th>{{$booking->start_time}}</th>
						<th>{{$booking->end_time}}</th>
						<th>{{$booking->peminjam->nrp_nip}}</th>
						<th>{{$booking->peminjam->namapeminjam}}</th>
						<th>{{$booking->peminjam->nohp_peminjam}}</th>
						<th>blm bs show<img src="public/images/{{$booking->image}}" alt=""></th>
						<th><form action="/verify/{{$booking->id}}" input="hidden" method="post">{{csrf_field()}}<button value="1" name="action" >Accept</button>
							<button value="-1" name="action">Reject</button></form></th>
					</tr>
					<!-- The Modal -->
					<div id="modal{{$booking->id}}" class="modal">

					  <!-- Modal content -->
						<div class="modal-content">
					    	<span class="close">&times;</span>
					    	<img src="{{ asset('public/images/' . $booking->image) }}">
					  	</div>
					</div>
				<!--@endif-->
			@endforeach
		@endif
	</table>
	<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>
@endsection

@section('script')
	@foreach($bookings as $booking)
		var modal = document.getElementById('modal{{$booking->id}}');
		var btn = document.getElementById("btn{{$booking->id}}");
		var span = document.getElementsByClassName("close")[0];
		btn.onclick = function() {
    		modal.style.display = "block";
		}
		
		span.onclick = function() {
    		modal.style.display = "none";
		}

		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
	@endforeach
@endsection