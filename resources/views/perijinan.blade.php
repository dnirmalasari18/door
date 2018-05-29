@extends('layout.app')

@section('title')
	Upload Perijinan
@endsection

@section('content')
<body>
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
                        <a class="navbar-brand" href="/"><img src="img/core-img/xlogo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/schedule">Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Contact</a>
                                </li>
                                 <li class="nav-item active">
                                    <a class="nav-link" href="/confirm">Upload Perizinan<span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                            <!-- Signin btn -->
                            <div class="dorne-signin-btn">
                                <a href="/login">Log in Admin</a>
                            </div>
                            <!-- Add listings btn -->
                            <div class="dorne-add-listings-btn  active">
                                <a href="/bookHere" class="btn dorne-btn">Book Here</a>
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

	@if(session()->has('message'))
	    <div class="alert alert-success">
	    	<p>Upload perijinan dengan token berikut:</p>
	        {{ session()->get('message') }}
	    </div>
	@endif   
	@if(session()->has('ololo'))
	    <div class="alert alert-success">
	        {{ session()->get('ololo') }}
	    </div>
	@endif  


	<div class="dorne-contact-area d-md-flex" id="contact">
        <div class="contact-form-area equal-height">
            <div class="contact-form">
                <div class="contact-form-title">
                    <h4>Insert your token here</h4>
                </div> 
	
				{!! Form::open(['action' => 'TableController@awalUploadSurjin','method'=>'POST','enctype' => 'multipart/form-data','autocomplete'=>'off']) !!}
					{{csrf_field()}}

				<div class="col-12">
			    	{{Form::label('btoken', 'Token')}}
					{{Form::text('btoken','', ['class'=>'form-control'])}}
					@if( $errors->has('btoken') ? ' has-error' : '' )
			    		<strong>{{ $errors->first('btoken') }}</strong>
			    	@endif 
			    </div>

					<br>

				<div class="dorne-add-listings-btn">
					{{Form::submit('Submit',['class'=>'btn dorne-btn'])}}
				</div>

				{!! Form::close() !!}

			</div>
		</div>
	</div>

	 <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> </a>
                        </p>
                    </div>
                   
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->
</body>

@endsection