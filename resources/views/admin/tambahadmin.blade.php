@extends('layout.app')

@section('title')
	Add New Admin
@endsection

@section('content')
<!-- Preloader -->
    <div id="preloader">
        <div class="dorne-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/home"><img src="img/core-img/xlogo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="/home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/scheduleAdmin">Schedule</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="/admin">Admin</a>
                                </li>
                            </ul>
                            <!-- Signin btn -->
                            <div class="dorne-signin-btn">
                                <a href="/bookedList">ACC</a>
                            </div>
                            <!-- ChangePass btn -->
                            <div class="dorne-search-btn">
                                <a href="/changePassword">Change Password</a>
                            </div>
                            <!-- Add logout btn -->
                            <div class="dorne-logout-btn">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" class="btn dorne-btn">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/tc.png)">
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Admin Area Start ***** -->
        <div class="dorne-contact-area d-md-flex" id="contact">
            <div class="contact-form-area equal-height">
                <div class="contact-form">
                    <div class="contact-form-title">
                        <h3 align="center">Add new admin</h3>
                    </div>


						{!! Form::open(['action' => 'TableController@storeUser','method'=>'POST','enctype' => 'multipart/form-data','autocomplete'=>'off']) !!}
							{{csrf_field()}}
							
						<div class="col-12">
					    	{{Form::label('name', 'Name')}}
					    	{{Form::text('name','', ['class'=>'form-control'])}} 
					    	@if( $errors->has('name') ? ' has-error' : '' )
					    		<strong>{{ $errors->first('name') }}</strong>
					    	@endif
					    	<!--bisa dispecifying htmlnya, liat dokumentasi laracollective ae-->
					    </div>

					    	<br>

					    <div class="col-12">
					    	{{Form::label('username', 'Username')}}
							{{Form::text('username','', ['class'=>'form-control'])}}
							@if( $errors->has('username') ? ' has-error' : '' )
					    		<strong>{{ $errors->first('username') }}</strong>
					    	@endif
					    </div>
							
							<br>

						<div class="col-12">
							{{Form::label('password', 'Password')}}
							{{ Form::password('password', array('class' => 'form-control')) }}
							@if( $errors->has('password') ? ' has-error' : '' )
					    		<strong>{{ $errors->first('password') }}</strong>
					    	@endif
					    </div>
							
							<br>

						<div class="col-12">
							{{Form::label('cpassword', 'Confirm Password')}}
							<input name="password_confirmation" type="password" class="form-control" value="" id="password_confirmation"/>
						</div>

						<div class="dorne-add-listings-btn">
							<br>
							{{Form::submit('Submit',['class'=>'btn dorne-btn'])}}
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>

	 <!-- ***** Admin Area End ***** -->

     <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>   
</body>

@endsection