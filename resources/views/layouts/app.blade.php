<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Avicenna Book Store</title>

    <!-- Boostrap-->
    <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.css')}}" media="screen" title="no title">
    <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}" media="screen" title="no title">
    <!-- FontAwsome-->
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.css')}}" media="screen" title="no title">
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" media="screen" title="no title">

    <!-- MyCss-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" media="screen" title="no title">
    <!-- JQuery-->

    <!-- JQuery-->
    <script type="text/javascript" src="{{asset('assets/jquery/jquery.js')}}"> </script>
    <script type="text/javascript" src="{{asset('assets/jquery/jquery.min.js')}}"> </script>
    <script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.js')}}"> </script>
    <script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"> </script>

    <!-- DatePicker -->
    <link rel="stylesheet" href="{{asset('/assets/datepicker/css/datepicker.css')}}">
    <script type="text/javascript" src="{{asset('assets/datepicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body id="avicenna">
    <div class="container">
      <div class="pull-right" id="atas">
        <a href="/cart" class="btn btn-default"><span class="fa fa-shopping-cart"></span> Cart
          <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</span>
        </a>
        @if(Auth::guest())
        <a href="/login" class="btn btn-default"> Login</a>
        @else
        <a class="btn btn-default">
          <span class="glyphicon glyphicon-headphones"></span>
          {{Auth::user()->name}}</a>
          <a class="btn btn-default" href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  <span class="fa fa-sign-out"></span> Logout
              </a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
        @endif
      </div>
      <div class="brand">
        <a href="/"><img src="{{asset('assets/img/Avicenna.png')}}" alt="" class="brand" /></a>
      </div>
    </div>
    <nav class="navbar navbar-default navbar-static-top" id="avicenna">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                  @if(Auth::check())
                  <li><a href="/"><span class="fa fa-shopping-cart"></span> Store</a></li>
                  <li><a href="{{url('dashboard')}}"><span class="fa fa-desktop"></span> Dashboard </a></li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-briefcase"></span> Storage <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{url('storage')}}"><span class="glyphicon glyphicon-import pull-right"></span>New Product</a></li>
                      <li><a href="{{url('product')}}"><span class="fa fa-dropbox pull-right"></span>All Products</a></li>
                      @foreach($category as $cat)
                      <li><a href="{{url('byCateg',$cat->id)}}">{{$cat->category}}</a></li>
                      @endforeach
                      <li><a href="{{url('empty')}}"><span class="glyphicon glyphicon-unchecked  pull-right"></span>Empty</a></li>
                      <li><a href="{{url('preorder')}}"><span class="fa fa-phone pull-right"></span>PreOrder</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="trie" aria-expanded="false">
                    <span class="fa fa-exchange"></span> Transaction <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{url('transIn')}}"><span class="fa fa-money pull-right"></span>Transaction</a></li>
                      <li><a href="{{url('orders')}}"><span class="fa fa-phone pull-right"></span>Orders</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><span class="fa fa-bar-chart"></span> Accounting</a></li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-wrench"></span> Settings <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">User Setting</a></li>
                      <li><a href="#">App  Setting</a></li>
                    </ul>
                  </li>
                  @endif
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-group"></span> customer <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{url('newcustomer')}}">New customer</a></li>
                      <li><a href="{{url('/customer')}}">All customer</a></li>

                    </ul>
                  </li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-user"></span> About <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Application</a></li>
                      <li><a href="#">Developer</a></li>
                    </ul>
                  </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right" style="padding-top:10px;">
                  <form class="form-inline" action="{{url('sCustomer')}}" method="get">

                      <div class="input-group">
                        <input type="text" name="sCustomer" id="sCustomer" class="form-control" placeholder="Cari Customer..">
                        <div class="input-group-addon">
                          <span class="fa fa-search"></span>
                        </div>
                      </div>

                  </form>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
