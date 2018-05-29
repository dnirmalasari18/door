@extends('layout.app')

@section('title')
	Accept
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
                                <li class="nav-item">
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
                        <h3 align="center">Booking List</h3>
                    </div>

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
								@if($booking['status_id']==1)
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
										<th><form class="form-control" action="/verify/{{$booking->id}}" input="hidden" method="post">{{csrf_field()}}<button value="1" name="action" >Accept</button>
											<button value="-1" name="action">Reject</button></form></th>
									</tr>
									@endif
								@endforeach	
						</table>
						@foreach($bookings as $booking)
						<div class="hehe" id="{{$booking->id}}" style= "display:none;">
								<p >{{$booking->namaevent}}</p>
								<img src="{{ url('storage/images/'.$booking->id .".jpg")}}" alt="" title="" />
						</div>
						@endforeach
					@endif
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
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>   
</body>
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