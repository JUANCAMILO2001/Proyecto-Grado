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



                            @if(Session('success'))
                                <div class="alert hide success">
                                    <span class="fas fa-check-circle"></span>
                                    <span class="msg">{{ session('success') }}</span>
                                    <div class="close-btn">
                                        <span class="fas fa-times"></span>
                                    </div>
                                </div>
                            @endif
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
                                        <div class="close-modal">
                                            <span class="btn-close-modal">x</span>
                                        </div>
                                        <img class="modal__img" src="/public{{ Storage::url($product->imagen) }}" alt="">
                                        <div class="gird-modal-content">
                                            <div class="text-modal">
                                                <p class="title-modal">{{ $product->name }}</p>
                                                <p>{{ $product->description }}</p>
                                                <p class="precio-modal">$ {{ number_format(intval($product->pay)) }}</p>
                                            </div>
                                            <form action="{{ route('add_to_cart', $product->id) }}" method="post" id="add_cart_{{ $loop->iteration }}">
                                                @csrf
                                                <div class="text-modal coment-modal">
                                                    <p class="sub-title-modal">Comentario para tu pedido:</p>
                                                    <textarea name="comment" id="comment" cols="30" rows="6"></textarea>
                                                </div>
                                                <div class="text-modal ">
                                                    <p class="sub-title-modal">Cantidad</p>
                                                    <div class="center-quantity">
                                                        <div class="number-input">
                                                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                                                            <input required class="quantity" min="0" name="quantity" placeholder="0" type="number">
                                                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="btn-modal">
                                                <a class="modal__agregar" onclick="document.getElementById('add_cart_{{ $loop->iteration }}').submit()">Añadir</a>
                                                <a class="modal__close">Cancelar</a>
                                            </div>
                                        </div>
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
                                        <div class="add_cart" title="Añadir al carrito">
                                            <a href="#" class="hero__cta" data-toggle="modal" data-target="#modal_{{ $loop->iteration }}">Añadir</a>
                                        </div>
                                    </div>
                                    <div class="hero-menu-item-details">
                                        <p>{{$product->description}}</p>
                                    </div>

                                </div>
                                <!-- hero-menu-item end-->
                                <!-- Modal -->
                                <section class="modal" id="modal_{{ $loop->iteration }}">
                                    <div class="modal__container">
                                        <div class="close-modal-special">
                                            <span class="btn-close-modal">x</span>
                                        </div>
                                        <img class="modal__img" src="/public{{ Storage::url($product->imagen) }}" alt="">
                                        <div class="gird-modal-content">
                                            <div class="text-modal">
                                                <p class="title-modal">{{ $product->name }}</p>
                                                <p>{{ $product->description }}</p>
                                                <p class="precio-modal">$ {{ number_format(intval($product->pay)) }}</p>
                                            </div>
                                            <div class="btn-modal">
                                                <a href="{{route('login')}}" class="modal__agregar">Iniciar Sesión</a>
                                                <a class="modal__close">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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
        .alert {
            padding: 20px 40px;
            min-width: 269px;
            position: absolute;
            right: -18px;
            top: 10px;
            border-radius: 4px;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
            z-index: 8;
        }

        .alert.showAlert {
            opacity: 1;
            pointer-events: auto;
        }

        .alert.show {
            animation: show_slide 1s ease forwards;
        }

        @keyframes show_slide {
            0% {
                transform: translateX(100%);
            }
            40% {
                transform: translateX(-10%);
            }
            80% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(-10px);
            }
        }

        .alert.hide {
            animation: hide_slide 1s ease forwards;
        }

        @keyframes hide_slide {
            0% {
                transform: translateX(-10px);
            }
            40% {
                transform: translateX(0%);
            }
            80% {
                transform: translateX(-10%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .alert .fas {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
        }

        .alert .msg {
            padding: 0 62px;
            font-size: 13px;
        }

        .alert .close-btn {
            position: absolute;
            right: 28px;
            top: 50%;
            transform: translateY(-50%);
            padding: 20px 18px;
            cursor: pointer;
        }

        .alert.warning {
            background: #ffdb9b;
            border-left: 8px solid #ffa502;
        }

        .alert.warning .fas {
            left: 20px;
            color: #ce8500;
        }

        .alert.success {
            background: #b7e8a5;
            border-left: 8px solid #7ed321;
        }

        .alert.success .fas {
            left: 20px;
            color: #4caf50;
        }

        .alert.error {
            background: #ff9b9b;
            border-left: 8px solid #ff2929;
        }

        .alert.error .fas {
            left: 20px;
            color: #f44336;
        }

    </style>
    <style>
        .lg-toolbar .lg-close:after {
            display: none;
        }
        #lg-zoom-in:after {
            display: none;
        }
        #lg-zoom-out:after {
            display: none;
        }
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
            width: 100%;
            max-width: 750px;
            max-height: 90%;
            background-color: #fff;
            border-radius: 6px;
            padding: 3em 2.5em;
            display: flex;
            gap: 3em;
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
            border-radius: 15px;
        }

        .modal__close{
            text-decoration: none;
            color: #C19D60;
            font-weight: bold;
            background-color: #fff;
            padding: 1em 3em;
            border: 1px solid #C19D60;
            border-radius: 6px;
            display: inline-block;
            transition: background-color .3s;
        }

        .modal__close:hover{
            color: #fff;
            font-weight: bold;
            background-color: #C19D60;
        }

        .modal__agregar{
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            background-color: #C19D60;
            padding: 1em 2em;
            border: 1px solid #C19D60;
            border-radius: 6px;
            display: inline-block;
            transition: background-color .3s;
            margin-left: 14px;
            margin-right: 21px;
        }

        .modal__agregar:hover{
            color: #C19D60;
            font-weight: bold;
            background-color: #fff;
            border-color: 1px solid #C19D60;
        }


        .close-modal{
            position: absolute;
            margin-right: 100px;
            margin-top: -337px;
            margin-left: 703px;
        }

        .close-modal-special{
            position: absolute;
            margin-right: 100px;
            margin-top: -240px;
            margin-left: 703px;
        }
        .btn-close-modal{
            background-color: #292929;
            padding: 0px 6px 2px 7px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            color: #fff;
        }
        .gird-modal-content{
            display: grid;
            width: 100%;
            align-items: start!important;
            max-height: 267px;
            overflow-y: scroll;
        }
        .title-modal{
            font-weight: bold;
            font-size: 25px;
            letter-spacing: 3px;
        }
        .precio-modal{
            font-weight: bold;
            font-size: 15px;
        }
        .sub-title-modal{
            font-size: 15px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .text-modal{
            text-align: left;
        }
        .coment-modal textarea{
            width: 97%;
            border-top-color: transparent;
            border-left-color: transparent;
            border-right-color: transparent;
            background-color: #d9d9d6;
        }
        .coment-modal textarea:focus{
            border-color: #5b5b5b;
        }
        .btn-modal{
            display: flex;
            margin-top: 15px;
        }

        .center-quantity{
            display: flex;
            justify-content: center;
            width: 100%;
        }

        input[type="number"] {
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }

        .number-input {
            border: 2px solid #5e646a;
            border-radius: 5px;
            display: inline-flex;
        }

        .number-input,
        .number-input * {
            box-sizing: border-box;
        }

        .number-input button {
            outline:none;
            -webkit-appearance: none;
            background-color: transparent;
            border: none;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            cursor: pointer;
            margin: 0;
            position: relative;
            color: #5e646a;
        }

        .number-input button:before,
        .number-input button:after {
            display: inline-block;
            position: absolute;
            content: '';
            width: 1rem;
            height: 2px;
            background-color: #5e646a;
            transform: translate(-50%, -50%);
        }
        .number-input button.plus:after {
            transform: translate(-50%, -50%) rotate(90deg);
        }

        .number-input input[type=number] {
            font-family: sans-serif;
            max-width: 3rem;
            padding: .5rem;
            border: solid #5e646a;
            border-width: 0 2px;
            font-size: 1rem;
            height: 2rem;
            font-weight: bold;
            text-align: center;
            color: #5e646a;
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
        $('#warningBtn').click(function(){
            $('.alert.warning').addClass("show");
            $('.alert.warning').removeClass("hide");
            $('.alert.warning').addClass("showAlert");
            setTimeout(function(){
                $('.alert.warning').removeClass("show");
                $('.alert.warning').addClass("hide");
            },5000);
        });

        $(document).ready(function(){
            $('.alert.success').addClass("show");
            $('.alert.success').removeClass("hide");
            $('.alert.success').addClass("showAlert");
            setTimeout(function(){
                $('.alert.success').removeClass("show");
                $('.alert.success').addClass("hide");
            },5000);
        });

        $('#errorBtn').click(function(){
            $('.alert.error').addClass("show");
            $('.alert.error').removeClass("hide");
            $('.alert.error').addClass("showAlert");
            setTimeout(function(){
                $('.alert.error').removeClass("show");
                $('.alert.error').addClass("hide");
            },5000);
        });

        $('.close-btn').click(function(){
            $(this).parent().removeClass("show");
            $(this).parent().addClass("hide");
        });


    </script>
    <script>
        const openModal = document.querySelectorAll('.hero__cta');
        const modals = document.querySelectorAll('.modal');
        const closeModal = document.querySelectorAll('.modal__close');
        const closeModal2 = document.querySelectorAll('.btn-close-modal');

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
        closeModal2.forEach((button, index) => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modals[index].classList.remove('modal--show');
            });
        });
    </script>
@endsection
