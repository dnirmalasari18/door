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
	<h1>accepppppttt</h1>
	isinya table<br>
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
		<tr>
			<th>nama</th>
			<th>tempat</th>
			<th>Tanggal</th>
			<th>Jenis Kegiatan</th>
			<th>Mulai</th>
			<th>Akhir</th>
			<th></th>
			<th>nrp</th>
			<th>nama</th>
			<th>nohp</th>
			<th><button>show</button></th>
			<th><button>setujui?</button></th>
		</tr>
		@if(count($bookings)>1)
			<form>
			@foreach($bookings as $booking)
				<!--@if($booking['status_id']==1)-->
					<tr>
						<th>{{$booking->namabooking}}</th>
						<th>{{$booking->kegiatan->id}}</th>
						<th>{{$booking->tempat_id}}</th>
						<th>{{$booking->dateevent}}</th>
						<th>{{$booking->start_time}}</th>
						<th>{{$booking->end_time}}</th>
						<th></th>
						<th>nrp{{$booking->peminjam_id}}</th>
						<th>nama{{$booking->peminjam_id}}</th>
						<th>nohp{{$booking->peminjam_id}}</th>
						<th><button>Show</button></th>
						<th><button>Accept</button>
							<button>Ignore</button></th>
					</tr>
				<!--@endif-->
			@endforeach
			</form>
		@endif
	</table>
@endsection