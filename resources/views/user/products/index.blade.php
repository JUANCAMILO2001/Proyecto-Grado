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
                                                            <input required class="quantity" min="0" name="quantity" value="0" type="number">
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
            color: black;
            font-weight: bold;
            background-color: #C19D60;
        }

        .modal__agregar{
            text-decoration: none;
            color: #C19D60;
            font-weight: bold;
            background-color: #fff;
            padding: 1em 3em;
            border: 1px solid #C19D60;
            border-radius: 6px;
            display: inline-block;
            transition: background-color .3s;
            margin-left: 14px;
            margin-right: 21px;
        }

        .modal__agregar:hover{
            color: black;
            font-weight: bold;
            background-color: #C19D60;
        }


        .close-modal{
            position: absolute;
            margin-right: 100px;
            margin-top: -337px;
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
            max-width: 2rem;
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
