<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - DeliPizza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link type="text/css" rel="stylesheet" href="{{url('Restabook/css/reset.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('Restabook/css/plugins.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('Restabook/css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('Restabook/css/cs-style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('Restabook/css/color.css')}}">
    <link rel="shortcut icon" href="{{url('Restabook/images/logo.ico')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    @yield('style')
</head>
<body>
<!-- lodaer  -->
<div class="loader-wrap">
    <div class="loader-item">
        <div class="cd-loader-layer" data-frame="25">
            <div class="loader-layer"></div>
        </div>
        <span class="loader"></span>
    </div>
</div>


<div id="main">
    <!-- header  -->
    <header class="main-header">
        <!-- header-top  -->
        <div class="header-inner  fl-wrap">
            @if(auth()->check())
                @if(auth()->user()->hasRole('admin'))
                    <div class="container">
                    <div class="header-container fl-wrap">
                        <!-- logo -->
                        <a href="/" class="logo-holder">
                            <img src="{{url('Restabook/images/Delipizza.png')}}" alt="">
                        </a>
                        <form action="{{route('logout')}}" method="post" id="cerrar">
                            @csrf
                        </form>
                        <!-- Cerrar Sesion -->
                        <div class="show-share-btn showshare htact ">
                            <a onclick="document.getElementById('cerrar').submit()">
                                <i class="material-symbols-outlined" style="color: #666;padding-top: 24px;">
                                    logout
                                </i>

                                <span class="header-tooltip">Cerrar Sesión</span>
                            </a>
                        </div>

                        <!-- Carrito navbar -->
                        <div class="show-cart sc_btn htact">
                            <i class="fal fa-shopping-bag"></i>
                            @php
                                $totalQuantity = 0;
                            @endphp

                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    @php
                                        $totalQuantity += $details['quantity'];
                                    @endphp
                                @endforeach
                            @endif
                            <span class="show-cart_count">{{ $totalQuantity }}</span>
                            <span class="header-tooltip">Tu Carrito</span>
                        </div>

                        <!-- nav-button-wrap responsive-->
                        <div class="nav-button-wrap">
                            <div class="nav-button">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <!--  navigation  de navs-->
                        <div class="nav-holder main-menu">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="/public" class="act-link">Inicio</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.dashboard')}}">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{route('products')}}">Productos</a>
                                    </li>
                                    <li><a href="/public/contact">Contactos</a></li>

                                </ul>
                            </nav>
                        </div>

                        <!-- container 2 -->
                        <!-- header-cart_wrap modal -->
                        <div class="header-cart_wrap novis_cart">
                            @php
                                $totalQuantity = 0;
                            @endphp

                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    @php
                                        $totalQuantity += $details['quantity'];
                                    @endphp
                                @endforeach
                            @endif
                                <div class="header-cart_title">Tu carrito <span>Numero items <b style="color: #C19D60">{{ $totalQuantity }}</b></span></div>
                                <div class="header-cart_wrap_container fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="widget-posts fl-wrap">
                                            @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)
                                                <ul>
                                                    <li class="clearfix">
                                                        <a href="#"  class="widget-posts-img"><img src="/public{{Storage::url($details['imagen'])}}" class="respimg" alt=""></a>
                                                        <div class="widget-posts-descr">
                                                            <a href="#" title="">{{ $details['name'] }}</a>
                                                            <div class="widget-posts-descr_calc clearfix">CNT/PRD: {{ $details['quantity'] }} <span>X</span> $ {{ number_format(intval($details['pay']))  }}</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @if(session('cart'))
                                @php $total = 0 @endphp
                                @foreach(session('cart') as $id => $details)
                                    @php
                                        $total += $details['pay'] * $details['quantity'];
                                    @endphp
                                @endforeach
                            @endif
                            @if(session('cart') && count(session('cart')) > 0)
                                <div class="header-cart_wrap_total fl-wrap">
                                    <div class="header-cart_wrap_total_item">Total: $ {{number_format(intval($total))}} <span></span></div>
                                </div>
                                <div class="header-cart_wrap_footer fl-wrap">
                                    <a href="{{route('cart')}}"> Pagar ahora</a>
                                </div>

                            @else
                                <div class="header-cart_title" style="display: flex; justify-content: center; align-items: center;">Tu carrito esta vacío</div>
                                <a href="{{ route('products') }}" class="btn btn-primary btn-block">Registra un producto en el carrito</a>
                            @endif


                        </div>
                    </div>
                </div>
                @elseif(auth()->user()->hasRole('cocinero'))
                    <div class="container">
                        <div class="header-container fl-wrap">
                            <!-- logo -->
                            <a href="/" class="logo-holder">
                                <img src="{{url('Restabook/images/Delipizza.png')}}" alt="">
                            </a>
                            <form action="{{route('logout')}}" method="post" id="cerrar">
                                @csrf
                            </form>
                            <!-- Cerrar Sesion -->
                            <div class="show-share-btn showshare htact ">
                                <a onclick="document.getElementById('cerrar').submit()">
                                    <i class="material-symbols-outlined" style="color: #666;padding-top: 24px;">
                                        logout
                                    </i>

                                    <span class="header-tooltip">Cerrar Sesión</span>
                                </a>
                            </div>

                            <!-- Carrito navbar -->
                            <div class="show-cart sc_btn htact">
                                <i class="fal fa-shopping-bag"></i>
                                @php
                                    $totalQuantity = 0;
                                @endphp

                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php
                                            $totalQuantity += $details['quantity'];
                                        @endphp
                                    @endforeach
                                @endif
                                <span class="show-cart_count">{{ $totalQuantity }}</span>
                                <span class="header-tooltip">Tu Carrito</span>
                            </div>

                            <!-- nav-button-wrap responsive-->
                            <div class="nav-button-wrap">
                                <div class="nav-button">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                            <!--  navigation  de navs-->
                            <div class="nav-holder main-menu">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="/public" class="act-link">Inicio</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.dashboard')}}">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="{{route('products')}}">Productos</a>
                                        </li>
                                        <li><a href="/public/contact">Contactos</a></li>

                                    </ul>
                                </nav>
                            </div>

                            <!-- container 2 -->
                            <!-- header-cart_wrap modal -->
                            <div class="header-cart_wrap novis_cart">
                                @php
                                    $totalQuantity = 0;
                                @endphp

                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php
                                            $totalQuantity += $details['quantity'];
                                        @endphp
                                    @endforeach
                                @endif
                                <div class="header-cart_title">Tu carrito <span>Numero items <b style="color: #C19D60">{{ $totalQuantity }}</b></span></div>
                                <div class="header-cart_wrap_container fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="widget-posts fl-wrap">
                                            @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)
                                                    <ul>
                                                        <li class="clearfix">
                                                            <a href="#"  class="widget-posts-img"><img src="/public{{Storage::url($details['imagen'])}}" class="respimg" alt=""></a>
                                                            <div class="widget-posts-descr">
                                                                <a href="#" title="">{{ $details['name'] }}</a>
                                                                <div class="widget-posts-descr_calc clearfix">CNT/PRD: {{ $details['quantity'] }} <span>X</span> $ {{ number_format(intval($details['pay']))  }}</div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if(session('cart'))
                                    @php $total = 0 @endphp
                                    @foreach(session('cart') as $id => $details)
                                        @php
                                            $total += $details['pay'] * $details['quantity'];
                                        @endphp
                                    @endforeach
                                @endif
                                @if(session('cart') && count(session('cart')) > 0)
                                    <div class="header-cart_wrap_total fl-wrap">
                                        <div class="header-cart_wrap_total_item">Total: $ {{number_format(intval($total))}} <span></span></div>
                                    </div>
                                    <div class="header-cart_wrap_footer fl-wrap">
                                        <a href="{{route('cart')}}">Pagar Ahora</a>
                                    </div>

                                @else
                                    <div class="header-cart_title" style="display: flex; justify-content: center; align-items: center;">Tu carrito esta vacío</div>
                                    <a href="{{ route('products') }}" class="btn btn-primary btn-block">Registra un producto en el carrito</a>
                                @endif


                            </div>
                        </div>
                    </div>
                @else
                    <div class="container">
                        <div class="header-container fl-wrap">
                            <!-- logo -->
                            <a href="/" class="logo-holder">
                                <img src="{{url('Restabook/images/Delipizza.png')}}" alt="">
                            </a>
                            <form action="{{route('logout')}}" method="post" id="cerrar">
                                @csrf
                            </form>
                            <!-- Cerrar Sesion -->
                            <div class="show-share-btn showshare htact ">
                                <a onclick="document.getElementById('cerrar').submit()">
                                    <i class="material-symbols-outlined" style="color: #666;padding-top: 24px;">
                                        logout
                                    </i>

                                    <span class="header-tooltip">Cerrar Sesión</span>
                                </a>
                            </div>

                            <!-- Carrito navbar -->
                            <div class="show-cart sc_btn htact">
                                <i class="fal fa-shopping-bag"></i>
                                @php
                                    $totalQuantity = 0;
                                @endphp

                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php
                                            $totalQuantity += $details['quantity'];
                                        @endphp
                                    @endforeach
                                @endif
                                <span class="show-cart_count">{{ $totalQuantity }}</span>
                                <span class="header-tooltip">Tu Carrito</span>
                            </div>

                            <!-- nav-button-wrap responsive-->
                            <div class="nav-button-wrap">
                                <div class="nav-button">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                            <!--  navigation  de navs-->
                            <div class="nav-holder main-menu">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="/public" class="act-link">Inicio</a>
                                        </li>
                                        <li>
                                            <a href="#">Pedidos</a>
                                        </li>
                                        <li>
                                            <a href="{{route('products')}}">Productos</a>
                                        </li>
                                        <li><a href="/public/contact">Contactos</a></li>

                                    </ul>
                                </nav>
                            </div>

                            <!-- container 2 -->
                            <!-- header-cart_wrap modal -->
                            <div class="header-cart_wrap novis_cart">
                                @php
                                    $totalQuantity = 0;
                                @endphp

                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php
                                            $totalQuantity += $details['quantity'];
                                        @endphp
                                    @endforeach
                                @endif
                                <div class="header-cart_title">Tu carrito <span>Numero items <b style="color: #C19D60">{{ $totalQuantity }}</b></span></div>
                                <div class="header-cart_wrap_container fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="widget-posts fl-wrap">
                                            @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)
                                                    <ul>
                                                        <li class="clearfix">
                                                            <a href="#"  class="widget-posts-img"><img src="/public{{Storage::url($details['imagen'])}}" class="respimg" alt=""></a>
                                                            <div class="widget-posts-descr">
                                                                <a href="#" title="">{{ $details['name'] }}</a>
                                                                <div class="widget-posts-descr_calc clearfix">CNT/PRD: {{ $details['quantity'] }} <span>X</span> $ {{ number_format(intval($details['pay']))  }}</div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if(session('cart'))
                                    @php $total = 0 @endphp
                                    @foreach(session('cart') as $id => $details)
                                        @php
                                            $total += $details['pay'] * $details['quantity'];
                                        @endphp
                                    @endforeach
                                @endif
                                @if(session('cart') && count(session('cart')) > 0)
                                    <div class="header-cart_wrap_total fl-wrap">
                                        <div class="header-cart_wrap_total_item">Total: $ {{number_format(intval($total))}} <span></span></div>
                                    </div>
                                    <div class="header-cart_wrap_footer fl-wrap">
                                        <a href="{{route('cart')}}">Pagar Ahora</a>
                                    </div>

                                @else
                                    <div class="header-cart_title" style="display: flex; justify-content: center; align-items: center;">Tu carrito esta vacío</div>
                                    <a href="{{ route('products') }}" class="btn btn-primary btn-block">Registra un producto en el carrito</a>
                                @endif


                            </div>
                        </div>
                    </div>
                @endif

            @else

                <div class="container">
                    <div class="header-container fl-wrap">
                        <a href="/" class="logo-holder">
                            <img src="{{url('Restabook/images/Delipizza.png')}}" alt="">
                        </a>

                        <!-- Reservaciones  -->
                        <div class="show-reserv_button ">
                            <a href="{{route('register')}}">
                                <span>Registrarse</span>
                                <i class="material-symbols-outlined" style="color: #666;padding-top: 24px;">
                                    person_add
                                </i>
                            </a>
                        </div>



                        <div class="show-share-btn showshare htact ">
                            <a href="{{route('login')}}">
                                <i class="material-symbols-outlined" style="color: #666;padding-top: 24px;">
                                    person
                                </i>
                                <span class="header-tooltip">Iniciar Sesión</span></a>
                        </div>



                        <!-- nav-button-wrap-->
                        <div class="nav-button-wrap">
                            <div class="nav-button">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <!--  navigation  de navs-->
                        <div class="nav-holder main-menu">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="/public" class="act-link">Inicio </a>
                                    </li>
                                    <li>
                                        <a href="{{route('products')}}">Productos</a>
                                    </li>
                                    <li><a href="/public/contact">Contactos</a></li>

                                </ul>
                            </nav>
                        </div>


                    </div>
                </div>

            @endif
        </div>
        <!-- header-inner end  -->
    </header>
    <!-- fin header  -->
    <div id="wrapper">
        @yield('content')
        <!-- footer -->
        <div class="height-emulator fl-wrap"></div>
        <footer class="fl-wrap dark-bg fixed-footer">
            <div class="container">
                <div class="footer-top fl-wrap">
                    <a href="/" class="footer-logo"><img src="{{url('Restabook/images/Delipizza-white.png')}}" alt=""></a>
                    <div class="footer-social">
                        <span class="footer-social-title">Siganos:</span>
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- footer-widget-wrap -->
                <div class="footer-widget-wrap fl-wrap">
                    <div class="row">
                        <!-- footer-widget -->
                        <div class="col-md-4">
                            <div class="footer-widget">
                                <div class="footer-widget-title">Sobre Nosotros</div>
                                <div class="footer-widget-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eaque ipsa quae ab illo inventore veritatis et quasi architecto. </p>

                                </div>
                            </div>
                        </div>
                        <!-- footer-widget  end-->
                        <!-- footer-widget -->
                        <div class="col-md-4">
                            <div class="footer-widget">
                                <div class="footer-widget-title">Contacto   </div>
                                <div class="footer-widget-content">
                                    <div class="footer-contacts footer-box fl-wrap">
                                        <ul>
                                            <li><span>Llamar:</span><a href="#">+57 666 999</a> , <a href="#">+57 999 666</a></li>
                                            <li><span>Escribenos:</span><a href="#">Delipizza@gmail.com</a></li>
                                            <li><span>Ubicados: </span><a href="#">Isla del sol</a></li>
                                        </ul>
                                    </div>
                                    <a href="/public/contact" class="footer-widget-content-link">Ponerse en Contacto</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer-widget-wrap end-->
                <div class="footer-bottom fl-wrap">
                    <div class="copyright">&#169; Delipizza 2022 . Reservados todos los derechos. </div>
                    <div class="to-top"><span>Volver al Arriba </span><i class="fal fa-angle-double-up"></i></div>
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>


    <!-- cursor-->
    <div class="element">
        <div class="element-item"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="{{url('Restabook/js/jquery.min.js')}}"></script>
<script src="{{url('Restabook/js/plugins.js')}}"></script>
<script src="{{url('Restabook/js/scripts.js')}}"></script>
<script src="{{url('Restabook/js/cs-scripts.js')}}"></script>

<script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
@yield('js')

</body>
</html>
