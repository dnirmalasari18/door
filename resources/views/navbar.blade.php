 <nav class="navbar navbar-inverse">
  <div class="container">
 <!--   <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">{{config('app.name')}}</a>
    </div>-->
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="/home">Home</a></li>
        <li><a href="/jadwal">Schedule</a></li>
        <li><a href="/contact">Contact</a></li>
        @guest
          <li><a href="{{ route('login') }}">Sign In Admin</a></li>
        @else
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
             Hello {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
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
        <li> Book Here! </li>
      </ul>
    </div>
  </div>
</nav>