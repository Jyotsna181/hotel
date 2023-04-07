<nav class="navbar  navbar-expand-md navbar-dark" style="background-color: orange">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse container" id="navbarsExample04">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item" >
            <a class="nav-link" style="font-weight: 500; font-size: 1.3rem; font-family: 'Inter';align-items: center; color:black;" href="{{ url('/')}}">Home</a>
        </li>
    </ul>
    @if (Route::has('login'))
        <div class="nav-item d-flex">
            @auth
            <h5 class="mt-2" style="font-weight: 500; font-size: 1.3rem; font-family: 'Inter';align-items: center;">{{$user->name}}</h5>
            <div class="sign_btn">
                <a class="text-decoration-none btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @else
                <div class="sign_btn">
                    <a href="{{ route('login') }}" class="text-decoration-none btn sign_btn">Sign in</a>
                </div>
            @endauth
        </div>
    @endif
    
</div>
</nav>
                
      