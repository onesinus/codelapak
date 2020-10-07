 <!-- Navigation -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <script>
      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({type: "GET",url: '{{url("home/getTotalBelanja")}}'}).done(function( total_belanja ) {
          $('.total_belanja').text(' '+total_belanja);
      });
 </script>
 <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{url('/#page-top')}}">Codelapak</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('/#about')}}">About</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="product">All Products</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('/#services')}}">Best Apps</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('/#portfolio')}}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('/#contact')}}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('home')}}">Apps</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('trainings')}}">Trainings</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('ebooks')}}">Ebooks</a>
          </li>          
          <li class="nav-item">
            <a href="{{ url('cart_detail') }}"><i class="fa fa-shopping-cart badge total_belanja" style="font-size: 16px;"></i></a>
          </li>          
          <li class="nav-item">
            @if (Auth::check())
              <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  [Logout]
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            @else
              <a class="nav-link js-scroll-trigger" href="{{url('login')}}">[Login|Register|Forgot Password]</a>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>