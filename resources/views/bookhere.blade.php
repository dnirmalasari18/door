@extends('layout.app')

@section('title')
    Booking
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
                                <li class="nav-item">
                                    <a class="nav-link" href="/confirm">Upload Perizinan</a>
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
        <!-- Book Form Area -->
        <div class="dorne-contact-area d-md-flex" id="contact">
            <div class="contact-form-area equal-height">
                <div class="contact-form">
                    <div class="contact-form-title">
                        <h4>Make your book here</h4>
                    </div> 
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <p>Upload perijinan dengan token berikut:</p>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if(session()->has('msg'))
                        <div class="alert alert-success">
                            {{ session()->get('msg') }}
                        </div>
                    @endif

                    {!! Form::open(['action' => 'TableController@storePeminjamBooking','method'=>'POST','enctype' => 'multipart/form-data','autocomplete'=>'off']) !!}
                        {{csrf_field()}}

                    <div class="col-12">
                        {{Form::label('namapeminjam', 'Name')}}
                        {{Form::text('namapeminjam','', ['class'=>'form-control'])}} 
                        @if( $errors->has('namapeminjam') ? ' has-error' : '' )
                            <strong>{{ $errors->first('namapeminjam') }}</strong>
                        @endif
                        <!--bisa dispecifying htmlnya, liat dokumentasi laracollective ae-->
                    </div>
                        <br>
                    <div class="col-12">
                        {{Form::label('rolepeminjam_id', 'Role')}}
                        {{Form::select('rolepeminjam_id',[''=>'','1'=>'Dosen','2'=> 'Mahasiswa'],'', ['class'=>'form-control'])}}
                        @if( $errors->has('rolepeminjam_id') ? ' has-error' : '' )
                            <strong>{{ $errors->first('rolepeminjam_id') }}</strong>
                        @endif
                    </div> 
                        <br>
                    <div class="col-12">
                        {{Form::label('nrp_nip', 'NRP/NIP')}}
                        {{ Form::text('nrp_nip','', ['class'=>'form-control']) }}
                        @if( $errors->has('nrp_nip') ? ' has-error' : '' )
                            <strong>{{ $errors->first('nrp_nip') }}</strong>
                        @endif
                    </div> 
                        <br>
                    <div class="col-12">
                        {{Form::label('nohp_peminjam', 'No. Handphone')}}
                        {{ Form::text('nohp_peminjam','', ['class'=>'form-control']) }}
                        @if( $errors->has('nohp_peminjam') ? ' has-error' : '' )
                            <strong>{{ $errors->first('nohp_peminjam') }}</strong>
                        @endif
                    </div>    
                        <br>
                    <div class="col-12">
                        {{Form::label('kegiatan_id', 'Tipe Kegiatan')}}
                        {{ Form::select('kegiatan_id',[''=>'','1'=>'Kuliah','2'=>'Praktikum','3'=>'Asistensi/Sesi Lab', '4'=>'Seminar','5'=>'Pelatihan/Workshop', '6'=>'Kuliah Tamu','7'=>'Perlombaan','8'=>'Kelas Pengganti','9'=>'Kegiatan Lain-Lain Himpunan','10'=>'Kegiatan Lain-Lain Bem Fakultas','11'=>'Kegiatan Lain-Lain BSO Informatika'],'', ['class'=>'form-control']) }}
                        @if( $errors->has('kegiatan_id') ? ' has-error' : '' )
                            <strong>{{ $errors->first('kegiatan_id') }}</strong>
                        @endif
                    </div>
                        <br>
                    <div class="col-12">
                        {{Form::label('tempat_id', 'Ruangan')}}
                        {{ Form::select('tempat_id',[''=>'','1'=>'IF-101','2'=>'IF-102','3'=>'IF-103','4'=>'IF-104','5'=>'IF-105a','6'=>'IF105-b','7'=>'IF-106','8'=>'IF-108','9'=>'Plaza Mahasiswa','10'=>'Plaza Lama 1','11'=>'Plaza Lama 2','12'=>'Plaza Baru 1','13'=>'Plaza Baru 2', '14'=>'Lapangan','15'=>'Aula Informatika','16'=>'LP','17'=>'LP2'],'', ['class'=>'form-control']) }}
                        @if( $errors->has('tempat_id') ? ' has-error' : '' )
                            <strong>{!! $errors->first('tempat_id') !!}</strong>
                        @endif
                    </div>
                        <br>
                    <div class="col-12">
                        {{Form::label('namabooking', 'Nama Kegiatan')}}
                        {{ Form::text('namabooking','', ['class'=>'form-control'])}}
                        @if( $errors->has('namabooking') ? ' has-error' : '' )
                            <strong>{{ $errors->first('namabooking') }}</strong>
                        @endif
                    </div>
                        <br>
                    <div class="col-12">
                        {{Form::label('dateevent', 'Tanggal',array('id'=>'date','min'=>'06/20/2018'))}}
                        {{ Form::date('dateevent','', ['class'=>'form-control'])}}
                        @if( $errors->has('dateevent') ? ' has-error' : '' )
                            <strong>{{ $errors->first('dateevent') }}</strong>
                        @endif
                    </div>
                        <br>
                    <div class="col-12">
                        {{Form::label('start_time', 'Start Time',array('min'=>'06.30'))}}
                        {{ Form::time('start_time','', ['class'=>'form-control'])}}
                        @if( $errors->has('start_time') ? ' has-error' : '' )
                            <strong>{{ $errors->first('start_time') }}</strong>
                        @endif
                    </div>
                        <br>
                    <div class="col-12">
                        {{Form::label('end_time', 'End Time')}}
                        {{Form::time('end_time' ,'', ['class'=>'form-control'])}}
                        @if( $errors->has('end_time') ? ' has-error' : '' )
                            <strong>{{ $errors->first('end_time') }}</strong>
                        @endif
                    </div>
                        <br>
                    <div class="dorne-add-listings-btn">
                        {{Form::submit('Submit' ,['class'=>'btn dorne-btn'])}}
                    </div>
                    {!! Form::close() !!}

</div>
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

@endsection