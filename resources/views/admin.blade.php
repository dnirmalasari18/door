@extends('layout.app')

@section('title')
	Admin Master Page
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
	<h1>Hello, {{ Auth::user()->name }}</h1>
	
	<table>	
		<tr>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Password</th>
			<th></th>
			<th><th>
		</tr>
		@if(count($users)<2)
			<tr>
				<th colspan="8">You are the only admin here</th>
			</tr>
		@elseif(count($users)>1)
			@foreach($users as $user)
				@if($user->role!=="master")
				<tr>
					<th>{{$user->name}}</th>
					<th>{{$user->username}}</th>
					<th>{{$user->email}}</th>
					<th><button>Change</button></th>
					<th><button>Edit</button></th>
					<th><button>Delete</button><th>
				</tr>
				@endif
			@endforeach
		@endif

	</table>
	<a><button>Add Admin</button></a>
@endsection