<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('extra-meta')
    <script src="https://kit.fontawesome.com/b53df7b79f.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel='stylesheet'>
    <script src="{{asset('js/app.js') }}" defer></script>
    <link href="{{asset('css/styleheader.css')}}" rel='stylesheet'>
    @yield('script')
    @yield('stylesheet')


</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="top-left links">

        </div>
        <div class="top-center img">
            <img id="mademoiselle" src="{{asset('images/mademoiselle2.png')}}" />
        </div>
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ route('home.index') }}">Home</a>

            <div class="dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <div class="dropdown-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <div class="dropdown-item">
                        <a href="{{route('order.index')}}">My Shopping Cart <span
                                class="badge badge-pill badge-dark">{{Cart::count()}}</span></a>
                    </div>
                    <div class="dropdown-item">
                      <a href="{{route('users.accountInformation')}}">My Account</a>
                    </div>
                    @admin
                    <div class="dropdown-item">
                        <a href="{{route('admin.users.index')}}">
                            User Management
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="{{route('carousel.index')}}">
                            Carousel Management
                        </a>
                    </div>
                    @endadmin


                </div>
            </div>



            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>

    <div class="navigation m-0 w-100">
        <a class="description w-20" href="{{url('/')}}" id="pres"><i class="fas fa-home"></i></a>
        <a class="description w-20" href="{{route('admin.products.index')}}" id="exp">PRODUCTS</a>
        <a class="description w-20" href="{{url('/restaurant')}}" id="etudes">RESTAURANT</a>
        <a class="description w-20" href="{{route('admin.news.index')}}" id="lan">NEWS</a>
        <a class="description w-20" href="{{route('order.indexSalableProducts')}}" id="info">ORDER</a>
    </div>


    @include('partials.alerts')
    @yield('content')

    <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="footer-widget">
                <h3>Stay in touch</h3>
                <div class="footer-widget-content d-flex flex-column">

                  <a href="mailto:sales@example.com" class="contact-link">sales@mademoiselle.com</a>
                  <a href="mailto:support@example.com" class="contact-link red"> support@mademoiselle.com </a>
                  <a href="tel:+351 22 016 0229" class="contact-link">+351 22 016 0229</a>
                  <div class="footer-social">
                  <ul>
                    <li><a href="https://www.facebook.com/MademoisellePavy/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                  </ul>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
            <div class="footer-widget">
              <h3>Latest Events</h3>
              <div class="footer-widget-content">
                <div class="media">
                    <div class="media-left">
                       <a href="#"><img class="media-object" src="http://placehold.it/60x60" alt="..."></a>
                    </div>
                    <div class="media-body">
                       <p><a href="#">vulputate velit esse consequat. </a></p>
                       <span>September 30, 2016 </span>
                    </div>
                 </div>
                <div class="media">
                    <div class="media-left">
                       <a href="#."><img class="media-object" src="http://placehold.it/60x60" alt="..."></a>
                    </div>
                    <div class="media-body">
                       <p><a href="#">vulputate velit esse consequat. </a></p>
                       <span>September 30, 2016 </span>
                    </div>
                 </div>
              </div>
              </div>
            </div>
            <div class="col-sm-4">
            <div class="footer-widget">
              <h3>Opening Hour</h3>
              <div class="footer-widget-content">
              <div class="open-time ">
                <ul class="opening-time">
                  <li><span><i class="fa fa-times"></i></span><p class="clock-time"><strong>sunday :</strong> closed</p>
                   </li>
                  <li><span><i class="fa fa-check"></i></span><p><strong>mon-fri :</strong> 7am - 8pm</p></li>
                  <li><span><i class="fa fa-check"></i></span><p><strong>saturday :</strong> 7am - 6pm</p></li>
                </ul>
                 </div>
              </div>
              </div></div>
            
            
        </div>
      </footer>

    @yield('extra-js')
</body>

</html>
