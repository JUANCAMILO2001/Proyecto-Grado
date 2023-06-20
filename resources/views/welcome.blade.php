@extends('layouts.guest')
@section('title', 'Inicio')
@section('content')
    @if(auth()->check())
        <!-- hero-wrap-->
        <div class="hero-wrap fl-wrap full-height" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="https://www.ocu.org/-/media/ocu/images/home/alimentacion/alimentos/pizzas_selector_1600x900.jpg?rev=6a81e278-07fc-4e95-9ba1-361063f35adf&hash=B8B1264AB6FC3F4B1AE140EB390208CD" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="hero-title-wrap fl-wrap">
                <div class="container">
                    <div class="hero-title">
                        <h2>Bienvenid@ a Delipizza <b style="color:#ffdb14;">{{auth()->user()->names}}</b>
                            <br>
                            Ahora podras continuar con tu Orden.
                        </h2>
                        <a href="{{route('products')}}" class="hero_btn">Ordenar Ahora <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!--hero-social-->
            <div class="hero-social">
                <ul>
                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                </ul>
            </div>
            <!--hero-social end-->
            <!-- hero-bottom-container -->
            <div class="hero-bottom-container">
                <div class="container">
                    <div class="scroll-down-wrap">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                        <span>Desplaza hacia abajo</span>
                    </div>
                    <a href="#sec2" class="sd_btn custom-scroll-link"><i class="fal fa-chevron-double-down"></i></a>
                </div>
            </div>
            <!-- hero-bottom-container -->
            <div class="hero-dec_top"></div>
            <div class="hero-dec_bottom"></div>
            <div class="brush-dec"></div>
        </div>
        <!-- hero-wrap  end -->
    @else
        <!-- hero-wrap-->
        <div class="hero-wrap fl-wrap full-height" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="https://www.ocu.org/-/media/ocu/images/home/alimentacion/alimentos/pizzas_selector_1600x900.jpg?rev=6a81e278-07fc-4e95-9ba1-361063f35adf&hash=B8B1264AB6FC3F4B1AE140EB390208CD" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="hero-title-wrap fl-wrap">
                <div class="container">
                    <div class="hero-title">

                        <h2>
                            Bienvenidos a Delipizza <br>¡Aqui podras pedir a DOMICILIO!
                        </h2>
                        <a href="{{route('register')}}" class="hero_btn">Registrate <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!--hero-social-->
            <div class="hero-social">
                <ul>
                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                </ul>
            </div>
            <!--hero-social end-->
            <!-- hero-bottom-container -->
            <div class="hero-bottom-container">
                <div class="container">
                    <div class="scroll-down-wrap">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                        <span>Desplaza hacia abajo</span>
                    </div>
                    <a href="#sec2" class="sd_btn custom-scroll-link"><i class="fal fa-chevron-double-down"></i></a>
                </div>
            </div>
            <!-- hero-bottom-container -->
            <div class="hero-dec_top"></div>
            <div class="hero-dec_bottom"></div>
            <div class="brush-dec"></div>
        </div>
        <!-- hero-wrap  end -->
    @endif

    <!-- contendio  -->
    <div class="content">
        <section class="hidden-section big-padding" data-scrollax-parent="true" id="sec2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-title text-align_left">
                            <h4>Nuestras Historias</h4>
                            <h2>Algunas Palabras sobre Nosotros</h2>
                            <div class="dots-separator fl-wrap"></div>
                        </div>
                        <div class="text-block ">
                            <p>
                                Delipizza lleva fundada desde el año 1995 en el barrio isla del sol desde este inicio
                                nace una gran parte de la historia de este barrio, siendo nosotros uno de los primeros
                                inquilinos de este amada urbanizacion.
                            </p>
                            <a href="{{route('products')}}" class="btn fl-btn">Ver Menú<i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" fl-wrap">
                            <div class="main-iamge">
                                <img src="data:image/jpeg;base64,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"   alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-dec "></div>
                <div class="wave-bg" data-scrollax="properties: { translateY: '-150px' }"></div>
            </div>
        </section>

        <!-- section   -->
        <section class="column-section no-padding hidden-section" data-scrollax-parent="true" id="sec4">
            <div class="column-wrap-bg left-wrap">
                <div class="bg par-elem "  data-bg="https://media.istockphoto.com/photos/close-up-of-fast-food-snacks-and-drink-on-table-picture-id487077896" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
                <div class="quote-box">
                    <i class="fal fa-quote-right"></i>
                    <p>
                        "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi accusantium."
                    </p>
                    <div class="signature"><img src="{{url('Restabook/images/signature.png')}}" alt=""></div>
                    <br>
                    <h4>Don Rodrigo / Doña Beatriz - Dueños</h4>
                </div>
            </div>
            <div class="column-section-wrap dark-bg" >
                <div class="container"  >
                    <div class="column-text">
                        <div class="section-title">
                            <h4>Llame para Reservaciones</h4>
                            <h2>Horario Apertura</h2>
                            <div class="dots-separator fl-wrap"><span></span></div>
                        </div>
                        <div class="work-time fl-wrap">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>Lunes a Viernes</h3>
                                    <div class="hours">
                                        04:30 pm<br>
                                        10:00 pm
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h3>Sabados y Domingos</h3>
                                    <div class="hours">
                                        4:00 pm<br>
                                        11:30 pm
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="bold-separator"><span></span></div>
                        <div class="big-number"><a href="#">+57 666 999</a></div>
                    </div>
                </div>
                <div class="illustration_bg">
                    <div class="bg"  data-bg="{{url('Restabook/images/7.png')}}"></div>
                </div>
            </div>
        </section>

        <!--  section    -->
        <section data-scrollax-parent="true">
            <div class="container">
                <div class="section-title">
                    <h4>Por qué la gente nos Elige</h4>
                    <h2>Prepárese para un servicio de primera clase</h2>
                    <div class="dots-separator fl-wrap"><span></span></div>
                </div>
                <div class="cards-wrap fl-wrap">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="content-inner fl-wrap">
                                <div class="content-front">
                                    <div class="cf-inner">
                                        <div class="bg "  ></div>
                                        <div class="overlay"></div>
                                        <div class="inner">
                                            <h2>Comidas Al instate</h2>
                                            <h4>Pide tu orden</h4>
                                        </div>
                                        <div class="serv-num">01.</div>
                                    </div>
                                </div>
                                <div class="content-back">
                                    <div class="cf-inner">
                                        <div class="inner">
                                            <div class="dec-icon">
                                                <i class="fal fa-fish"></i>
                                            </div>
                                            <p>Tendremos tu Pedido en el menor tiempo posible ya que sabes cuanto deseas dar el primer Mordisco.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="content-inner fl-wrap">
                                <div class="content-front">
                                    <div class="cf-inner">
                                        <div class="bg "></div>
                                        <div class="overlay"></div>
                                        <div class="inner">
                                            <h2 style="font-size: 22px;">Ingredientes frescos,Comidas Sabrosas</h2>
                                            <h4>La calidad es el Corazón</h4>
                                        </div>
                                        <div class="serv-num">02.</div>
                                    </div>
                                </div>
                                <div class="content-back">
                                    <div class="cf-inner">
                                        <div class="inner">
                                            <div class="dec-icon">
                                                <i class="fal fa-carrot"></i>
                                            </div>
                                            <p>Traemos los mejores Productos para que ustedes Nuestros amadas Clientes disfruten de una comida sabarosa.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="content-inner fl-wrap">
                                <div class="content-front">
                                    <div class="cf-inner">
                                        <div class="bg " ></div>
                                        <div class="overlay"></div>
                                        <div class="inner">
                                            <h2>Chefs Talentosos</h2>
                                            <h4>Caliente y listo para Comer</h4>
                                        </div>
                                        <div class="serv-num">03.</div>
                                    </div>
                                </div>
                                <div class="content-back">
                                    <div class="cf-inner">
                                        <div class="inner">
                                            <div class="dec-icon">
                                                <i class="fal fa-utensils-alt"></i>
                                            </div>
                                            <p>Disfruta de tu Pedido preparado por los mejores Chefs de la zona Ya que entregan todo para que ustedes Nuestros Clientes nos sigan PREFIRIENDO.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-bg">
                <div class="bg"  data-bg="{{url('Restabook/images/section-bg.png')}}"></div>
            </div>

        </section>


    </div>
@endsection
