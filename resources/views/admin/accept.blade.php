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
			<th>Date TimeStart</th>
			<th>Date Time End</th>
			<th>Perulangan</th>
			<th>Pemesan</th>
			<th>NRP</th>
			<th>Nama Pemesan</th>
			<th>Email Pemesan</th>
			<th>Nomor HP Pemesan</th>
			<th>Surat Ijin</th>
			<th>Status</th>
		</tr>
		<tr>
			<th>Mulainya</th>
			<th>Akhirnya</th>
			<th>Harian/Mingguan/2Mingguan</th>
			<th>Atas nama mahasiswa/HMTC/BSO/BEMF/BEMI/Himpunan/Dosen</th>
			<th>?</th>
			<th>?</th>
			<th>?</th>
			<th>?</th>
			<th><button>show</button></th>
			<th><button>setujui?</button></th>
		</tr>
	</table>
@endsection