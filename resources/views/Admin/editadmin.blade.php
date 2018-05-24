@section('content')
	{!! Form::model($user, ['route' => 'TableController@storeUser','method'=>'POST','enctype' => 'multipart/form-data']) !!}
	{!! Form::close() !!}
@endsection