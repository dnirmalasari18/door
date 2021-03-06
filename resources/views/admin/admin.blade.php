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
                        <h3 align="center">Hello, {{ Auth::user()->name }}</h3>
                         @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                         @endif
                    </div>
        
                    <table> 
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Time Created</th>
                            <th></th>
                        </tr>

                        @if(count($users)<2)
                            <tr>
                                <th colspan="4">You are the only admin here</th>
                            </tr>
                        @elseif(count($users)>1)
                            <form>
                            @foreach($users as $user)
                                @if($user->role!=="master")
                                <tr>
                                    <th>{{$user->name}}</th>
                                    <th>{{$user->username}}</th>
                                    <th>{{$user->created_at}}<th>
                                    <button class="btn dorne-btn" formmethod="get" formaction="/deleteAdmin" type="submit" name="user_id" value="{{$user->id}}">Delete</button>
                                </tr>
                                @endif
                            @endforeach
                            </form>
                        @endif

                    </table>
                    <br>
                    <a href="/addAdmin"><button style="margin-left: 40%" class="btn dorne-btn">Add New Admin</button></a>
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