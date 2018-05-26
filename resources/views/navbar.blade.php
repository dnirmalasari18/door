 <nav class="navbar navbar-inverse">
  <div class="container">
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="/schedule">Schedule</a></li>
        <li><a href="/contact">Contact</a></li>
        <li><a href="/confirm">Confirm</a></li>
        
        @guest
          <li><a href="{{ route('login') }}">Sign In Admin</a></li>
          
          <li><a href="/bookHere"> Book Here! </a></li>
        @else
          <li><a href="/bookedList">Booking List</li>
            
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
             Hello {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              @if(Auth::user()->role=="master")
                <li> <a href="/admin">Administrator Page</a></li>
                <li> <a href="/changePassword">Change My Password</a></li>
              @endif
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>

        @endguest
        
      </ul>
    </div>
  </div>
</nav>