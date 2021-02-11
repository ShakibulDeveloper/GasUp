<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LPG Gas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend_assets/css/style.css')}}">
</head>


<body id="customers_detailsID" class="customers_details">
    <section id="navber">
        <!-- Navber start -->
        <div class="navber-container">
            <div class="logo">
                <a href="{{ route('order_overall') }}"><img src="{{asset('public/frontend_assets/images/logo.png')}}" alt="logo"></a>
            </div>
            <div class="nav-link">
                <ul>
                    <li><a href="{{route('sale')}}"><img src="{{asset('public/frontend_assets/images/Vector.png')}}" alt="Vector-img"> Gas Up Sales</a></li>
                    <li><a href="{{ route('order_overall') }}"><img src="{{asset('public/frontend_assets/images/Vector2.png')}}" alt="Vector-img"> Orders</a></li>
                    <li><a href="{{ route('customer_view') }}"><img src="{{asset('public/frontend_assets/images/Vector3.png')}}" alt="Vector-img"> Customers Overview</a></li>
                    <li><a href="{{ route('courier_overview.index') }}" class="couriers"><img src="{{asset('public/frontend_assets/images/Vector5.png')}}" alt="Vector-img"> Couriers overview</a></li>
                    <li>
                      <a  href="{{ route('logout') }}" class="dropdown-item logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                 <img src="{{asset('assets/images/Vector4.png')}}">Log out</a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Navber ends -->

        @yield('dashboard')

    </section>

    @yield('customer_overview')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'></script>
    @yield('pie_chart')
    @yield('customer_chart')
  </body>

</html>
