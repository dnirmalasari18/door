@extends('layout.app')

@section('title')
    Jadwal
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
                                <li class="nav-item active">
                                    <a class="nav-link" href="/schedule">Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Contact<span class="sr-only">(current)</span></a>
                                     <li class="nav-item">
                                    <a class="nav-link" href="/confirm">Upload Perizinan</a>
                                </li>
                                </li>
                            </ul>
                            <!-- Signin btn -->
                            <div class="dorne-signin-btn">
                                <a href="/login">Log in Admin</a>
                            </div>
                            <!-- Add listings btn -->
                            <div class="dorne-add-listings-btn">
                                <a href="/bookHere" class="btn dorne-btn">Book Here<span class="sr-only">(current)</span></a>
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

     <!-- Hero Search Form -->
    <div class="hero-search-form">
        <!-- Tabs -->
        <div class="nav nav-tabs" id="heroTab" role="tablist">

            @if(count($tempats)>0)
                @foreach($tempats as $tempat)
                    @if($tempat['id']<16)
                        <a class="nav-item nav-link" id="button{{$tempat->id}}" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">{{$tempat->namatempat}}</a>
                    @elseif($tempat['id']===16)
                        <a class="nav-item nav-link" id="button{{$tempat->id}}" target="blank" href="http://reservasi.lp.if.its.ac.id" aria-controls="nav-events" aria-selected="true">{{$tempat->namatempat}}</a>
                    @elseif($tempat['id']===17)
                        <a class="nav-item nav-link" id="button{{$tempat->id}}" target="blank" href="http://reservasi.lp2.if.its.ac.id" aria-controls="nav-events" aria-selected="true">{{$tempat->namatempat}}</a>
                    @endif
                @endforeach
            <br>

        </div>


            <div class="tab-content" id="nav-tabContent">  
                <div class="tab-pane show active" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
                    @foreach($tempats as $tempat)
                        @if($tempat['id']<16)
                        <div class="hehe" id="{{$tempat->id}}" style= "display:none;">
                            <table style="margin-left: 170px"> 
                            <tr>
                                <th style="width: 21%">Nama Event</th>
                                <th style="width: 10%">Tempat</th>
                                <th style="width: 19%">Jenis Kegiatan</th>
                                <th style="width: 13%">Date</th>
                                <th style="width: 12.5%">Time Start</th>
                                <th style="width: 12.5%">Time End</th>
                                <th style="width: 12%">Status</th>
                            </tr>
                            @if(count($bookings)>1)
                                @foreach($bookings as $booking)
                                    @if($booking['tempat_id']==$tempat['id'] && $booking['status_id']!=3)
                                    <tr>
                                        <th>{{$booking->namabooking}}</th>
                                        <th>{{$booking->tempat->namatempat}}</th>
                                        <th>{{$booking->kegiatan->namakegiatan}}</th>
                                        <th>{{$booking->dateevent}}</th>
                                        <th>{{$booking->start_time}}</th>
                                        <th>{{$booking->end_time}}</th>
                                        <th>{{$booking->status->namastatus}}</th>
                                    </tr>
                                    @endif
                                @endforeach
                            @endif
                            </table>
                         </div>
                        @endif
                    @endforeach
               
                        @else
                            <p>No data found</p>
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
    @foreach($tempats as $tempat)
        @if($tempat['id']<16)
            $(document).ready(function(){
                $("#button{{$tempat->id}}").click(function(){
                    $(".hehe").hide();
                    $("#{{$tempat->id}}").show();
                });
            });
        @endif
    @endforeach
@endsection
