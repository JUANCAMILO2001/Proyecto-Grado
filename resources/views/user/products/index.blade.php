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
                                <!-- hero-menu-item -->
                                <div class="hero-menu-item" style="height: 112px;">
                                    <a href="/public/{{ Storage::url($product->imagen) }}" class="hero-menu-item-img image-popup">
                                        <img src="/public/{{ Storage::url($product->imagen) }}" alt="">
                                    </a>
                                    <div class="hero-menu-item-title fl-wrap">
                                        <h6>{{ $product->name }}</h6>
                                        <div class="hmi-dec" style="left: 162px;"></div>
                                        <span class="hero-menu-item-price">$ {{ number_format(intval($product->pay)) }}</span>
                                        <div class="add_cart" title="Añadir al carrito">
                                            <a href="#" class="hero__cta" data-toggle="modal" data-target="#modal_{{ $loop->iteration }}">Añadir</a>
                                        </div>
                                    </div>
                                    <div class="hero-menu-item-details">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                                <!-- hero-menu-item end -->

                                <!-- Modal -->
                                <section class="modal" id="modal_{{ $loop->iteration }}">
                                    <div class="modal__container">
                                        <div>
                                            <img class="modal__img" src="/public{{ Storage::url($product->imagen) }}" alt="">
                                        </div>
                                        <div>
                                            <h6>{{ $product->name }}</h6>
                                        <span class="hero-menu-item-price">$ {{ number_format(intval($product->pay)) }}</span>
                                        <form action="{{ route('add_to_cart', $product->id) }}" method="post" id="add_cart_{{ $loop->iteration }}">
                                            @csrf
                                        </form>
                                        
                                        <textarea name="" id="" cols="30" rows="10"></textarea>
                                        <a style="background-color: green;color: white;height: 23px;width: 75px;border-radius: 5px;" onclick="document.getElementById('add_cart_{{ $loop->iteration }}').submit()">Añadir</a>
                                        </div>
                                        <a href="#" class="modal__close">Cerrar producto</a>
                                    </div>
                                </section>
                            @endforeach
                        @else
                            @foreach($products as $product)
                                <!-- hero-menu-item-->
                                <div class="hero-menu-item" style="height: 112px;">
                                    <a href="/public/{{Storage::url($product->imagen)}}" class="hero-menu-item-img image-popup">
                                        <img src="/public/{{Storage::url($product->imagen)}}" alt="">
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
@section('style')
    <style>
        .modal{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #111111bd;
            display: flex;
            opacity: 0;
            pointer-events: none;
            transition: opacity .6s .9s;
            --transform: translateY(-100vh);
            --transition: transform .8s;
        }
        .modal--show{
            opacity: 1;
            pointer-events: unset;
            transition: opacity .6s;
            --transform: translateY(0);
            --transition: transform .8s .8s;
            z-index: 6;
        }

        .modal__container{
            margin: auto;
            width: 90%;
            max-width: 600px;
            max-height: 90%;
            background-color: #fff;
            border-radius: 6px;
            padding: 3em 2.5em;
            display: grid;
            gap: 1em;
            place-items: center;
            grid-auto-columns: 100%;
            transform: var(--transform);
            transition:var(--transition);
        }

        .modal__title{
            font-size: 2.5rem;
        }

        .modal__paragraph{
            margin-bottom: 10px;
        }

        .modal__img{
            width: 90%;
            max-width: 300px;
        }

        .modal__close{
            text-decoration: none;
            color: #fff;
            background-color: #F26250;
            padding: 1em 3em;
            border: 1px solid ;
            border-radius: 6px;
            display: inline-block;
            font-weight: 300;
            transition: background-color .3s;
        }

        .modal__close:hover{
            color: #F26250;
            background-color: #fff;
        }
        @media (max-width:800px) {
            .modal__container{
                padding: 2em 1.5em;
            }

            .modal__title{
                font-size: 2rem;
            }
        }
    </style>
@endsection
@section('js')
    <script>
        const openModal = document.querySelectorAll('.hero__cta');
        const modals = document.querySelectorAll('.modal');
        const closeModal = document.querySelectorAll('.modal__close');

        openModal.forEach((button, index) => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modals[index].classList.add('modal--show');
            });
        });

        closeModal.forEach((button, index) => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modals[index].classList.remove('modal--show');
            });
        });
    </script>
@endsection
