<div class="flex-center position-ref full-height">
    <div class="top-left links">
        <!-- A faire: SCOUT LARAVEL-->
        <i class="fas fa-search"></i>
        <a href="{{url('/home')}}">Search</a>
    </div>
    <div class="top-center img">
        <img src="../images/mademoiselle2.png"/>
    </div>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>

<div class="container">
<a class="description" href="{{url('/')}}" id="pres" ><i class="fas fa-home"></i></a>
<a class="description" href="{{url('/products')}}" id="exp" >PRODUCTS</a>
<a class="description" href="{{url('/restaurant')}}" id="etudes" >RESTAURANT</a>
<a class="description" href="{{url('/news')}}" id="lan" >NEWS</a>
<a class="description" href="{{url('/order')}}" id="info" >ORDER</a>
<span id="slider"></span>
</div>
