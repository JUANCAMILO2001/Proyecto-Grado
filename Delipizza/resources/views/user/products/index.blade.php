@extends('layouts.guest')
@section('title', 'Productos')
@section('content')
        <!-- content  -->
        <div class="content">
            <!--  section  -->
            <section>
                <div class="container">
                    <!-- menu-wrapper-->
                    <div class="menu-wrapper single-menu fl-wrap" id="menu-section-1" data-scrollax-parent="true">
                        <div class="menu-wrapper-title fl-wrap">
                            <div class="menu-wrapper-title-item">
                                <h4>Productos</h4>
                                <h5>Los mejores productos de la industria de las comidas rapidas.</h5>
                            </div>
                            <div class="bg par-elem " data-bg="images/bg/2.jpg" data-scrollax="properties: { translateY: '40%' }" ></div>
                            <div class="overlay"></div>
                            <span class="menu-wrapper-title_number"><i class="fa fa-cutlery" aria-hidden="true"></i></span>
                        </div>
                        @if(auth()->check())
                            @foreach($products as $product)
                                <!-- hero-menu-item-->
                                <div class="hero-menu-item" style="height: 112px;">
                                    <a href="images/menu/1.jpg" class="hero-menu-item-img image-popup">
                                        <img src="images/menu/thumbnails/1.jpg" alt="">
                                    </a>
                                    <div class="hero-menu-item-title fl-wrap">
                                        <h6>{{$product->name}}</h6>
                                        <div class="hmi-dec" style="left: 162px;"></div>
                                        <span class="hero-menu-item-price">$ {{number_format(intval($product->pay))}}</span>
                                        <div class="add_cart" title="Añadir al carrito">Añadir</div>
                                    </div>
                                    <div class="hero-menu-item-details">
                                        <p>{{$product->description}}</p>
                                    </div>
                                </div>
                                <!-- hero-menu-item end-->
                            @endforeach
                        @else
                            @foreach($products as $product)
                                <!-- hero-menu-item-->
                                <div class="hero-menu-item" style="height: 112px;">
                                    <a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr_D-xwPFkAVpXkiwUlS042axHskwWbVtUJg&usqp=CAU" class="hero-menu-item-img image-popup">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr_D-xwPFkAVpXkiwUlS042axHskwWbVtUJg&usqp=CAU" alt="">
                                    </a>
                                    <div class="hero-menu-item-title fl-wrap">
                                        <h6>{{$product->name}}</h6>
                                        <div class="hmi-dec" style="left: 162px;"></div>
                                        <span class="hero-menu-item-price">$ {{number_format(intval($product->pay))}}</span>
                                    </div>
                                    <div class="hero-menu-item-details">
                                        <p>{{$product->description}}</p>
                                    </div>
                                </div>
                                <!-- hero-menu-item end-->
                            @endforeach
                        @endif
                    </div>
                    <!-- menu-wrapper end-->
                    <div class="dots-separator fl-wrap"><span></span></div>
                    <!-- menu-wrapper-->
                    <a href="{{url('Restabook/pdf/menu-delipizza.pdf')}}" target="_blank"  class="btn">Descargar el menu<i class="fal fa-long-arrow-right"></i></a>
                </div>
            </section>
        </div>
@endsection
