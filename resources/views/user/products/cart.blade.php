@extends('layouts.guest')
@section('title', 'Carrito de compra')
@section('content')
    <!-- content  -->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
            @if(Session('success'))
                <div class="alert hide success">
                    <span class="fas fa-check-circle"></span>
                    <span class="msg">{{ session('success') }}</span>
                    <div class="close-btn">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            @endif
            <div class="bg par-elem "  data-bg="https://media.istockphoto.com/photos/fast-food-and-drink-on-table-picture-id1031354828" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title">
                    <h4>Pide tu comida con servicio a Domicilio Gratis</h4>
                    <h2>Tu Carrito</h2>
                    <div class="dots-separator fl-wrap"><span></span></div>
                </div>
            </div>
            <div class="hero-section-scroll">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
            </div>
            <div class="brush-dec"></div>
        </section>
        <!--  section  end-->
        <!--  section  -->
        <section class="hidden-section">
            <div class="container">
                @php
                    // SDK de Mercado Pago
                    require base_path('/vendor/autoload.php');
                    // Agrega credenciales
                    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

                    // Calcular la cantidad total y el precio total del carrito
                    $totalQuantity = 0;
                    $total = 0;
                    $items = []; // Array auxiliar para almacenar los ítems del carrito

                    if(session('cart')) {
                        foreach(session('cart') as $id => $details) {
                            $totalQuantity += $details['quantity'];
                            $total += $details['pay'] * $details['quantity'];

                            // Agregar cada ítem del carrito al array auxiliar
                            $item = new MercadoPago\Item();
                            $item->title = $details['name'];
                            $item->quantity = $details['quantity'];
                            $item->unit_price = $details['pay'];
                            $items[] = $item;
                        }
                    }

                    $preference = new MercadoPago\Preference();
                    $preference->items = $items; // Asignar el array auxiliar a la propiedad items
                $preference->save();
                @endphp
                <!-- CHECKOUT TABLE -->
                <div class="row">
                    <div class="col-md-8">
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
                        @if($totalQuantity > 0)
                            <h4 class="cart-title">Tu Carrito <span>{{ $totalQuantity }} Items</span></h4><br>

                            <div class="table-cart">
                                <table class="table table-border checkout-table">
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                        <th>Comentario</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $total = 0 @endphp
                                    @foreach(session('cart') as $id => $details)
                                        @php $total += $details['pay'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <td class="pr-remove">
                                                <a><img src="/public{{Storage::url($details['imagen'])}}" class="respimg"></a>
                                            </td>
                                            <td class="pr-remove">
                                                <h5 class="product-name">{{$details['name']}}</h5>
                                            </td>
                                            <td class="pr-remove">
                                                <h5 class="order-money">${{number_format(intval($details['pay']))}}</h5>
                                            </td>
                                            <td class="pr-remove">
                                                <h5 class="order-money">${{ number_format(intval($details['pay'] * $details['quantity'])) }}</h5>
                                            </td>
                                            <td>
                                                <textarea name="comment" class="order-comment" rows="4">{{ $details['comment'] }}</textarea>
                                            </td>
                                            <td class="pr-remove">
                                                <input type="number" name="quantity" id="quantity" value="{{ $details['quantity'] }}" min="1" class="order-count cart_update">
                                            </td>
                                            <td class="pr-remove">
                                                <input type="hidden" value="{{ $id }}" id="id" name="id">
                                                <button class="cart_remove" title="Eliminar"><i class="material-symbols-outlined">close</i></button>
                                            </td>
                                            <td class="pr-remove"> <!-- Added the 'Editar' button -->
                                                <button class="cart_edit" title="Editar"><i class="material-symbols-outlined">edit</i></button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <!-- COUPON -->
                            <div class="coupon-holder">
                                <form action="{{ route('clear_cart') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit" class="btn-a">Borrar Carrito</button>
                                </form>
                                <button class="pull-right btn-uc"><a href="{{route('products')}}" style="color: #FFFFFF">Volver al Menú</a></button>

                            </div>
                            <!-- /COUPON -->
                        @else
                            <div class="no-hay-productos">
                                <h4 class="cart-title">No hay Productos en su Carro</h4><br>
                                <a href="{{route('products')}}" class="btn btn-dark">Volver al Menú</a>
                                <br><br><br>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <!-- CART TOTALS  -->
                        @if($totalQuantity > 0)
                            <div class="cart-totals dark-bg fl-wrap">
                                <h3>Total del Carrito</h3>
                                <table class="total-table">
                                    <tbody>
                                    <tr>
                                        <th>Subtotal del Carrito:</th>
                                        <td>${{number_format(intval($total))}} COP</td>
                                    </tr>
                                    <tr>
                                        <th>Total de Productos:</th>
                                        <td>{{$totalQuantity}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="cart-totals_btn color-bg">
                                    <a href="#"  class="hero__ctas_pagocontra" style="color: #fff;">Pago Contra Entrega</a>
                                </button>
                                <div id="wallet_container"></div>
                                <div style="">
                                    <a href="asdasd" class="hero__ctas_daviplata" title="Daviplata">
                                        <button type="button" style="background-image: url('{{url('images/daviplata.png')}}'); background-size: cover; background-repeat: no-repeat; width: 15px; height: 39px; border-radius: 50%">
                                        </button>
                                    </a>
                                    <a href="" title="Nequi" class="hero__ctas_nequi" style="margin-right: 8px">
                                        <button type="button" style="background-image: url('{{url('images/nequi.png')}}'); background-size: cover; background-repeat: no-repeat; width: 15px; height: 39px; border-radius: 50%; margin-right: 10px">
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <!--Modal pedio contra entrega-->
                            <section class="modal_pagocontra">
                                <div class="modal__container_pagocontra">
                                    <img src="{{url('images/scooter-de-entrega.gif')}}" class="modal__img_pagocontra">
                                    <div class="grid-modal_pagocontra">
                                        <p class="modal__title-special">¡Estas a un paso de finalizar tu compra!</p>
                                        <p class="modal__title-total">Total de la compra: $ {{number_format(intval($total))}} COP</p>

                                        <form class="custom-form-lg" action="{{route('pagar')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="method_pay" value="Efectivo">
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                                            <label for="">Dirección de recidencia</label> <br>
                                            <div class="form-floating mb-3 btn-1">
                                                <input type="text"  name="address_bill"  placeholder="Dirección de recidencia" value="{{auth()->user()->address}}">
                                            </div>
                                            <br>
                                            <label for="">Con cuanto cancelas</label> <br>
                                            <div class="form-floating mb-3 btn-1">
                                                <input type="text"  name="pay_cacelar"  placeholder="Con cuanto cancelas">
                                            </div>
                                            <br>
                                            <button type="submit" style="cursor: pointer; background-color: #c19d60; color: #fff; border: 1px solid #c19d60!important; height: 45px; width: 96px; border-radius: 6px">Pagar</button>
                                            <a href="#" class="modal__close_pagocontra">Cerrar Modal</a>
                                        </form>

                                    </div>
                                </div>
                            </section>

                            <!--Modal daviplata-->
                            <section class="modal_daviplata">
                                <div class="modal__container_daviplata">
                                    <img src="{{url('images/qr_daviplata.jpg')}}" class="modal__img_daviplata">
                                    <div class="grid-modal_daviplata">
                                        <p class="modal__title-daviplata">¡daviplata Estas a un paso de finalizar tu compra!</p>
                                        <p class="modal__title-daviplata">Total de la compra: $ {{number_format(intval($total))}} COP</p>

                                        <form class="custom-form-lg" action="{{route('pagar')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="method_pay" value="Daviplata">
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                                            <label for="">Dirección de recidencia</label> <br>
                                            <div class="form-floating mb-3 btn-1">
                                                <input type="text"  name="address_bill"  placeholder="Dirección de recidencia" value="{{auth()->user()->address}}">
                                            </div>
                                            <br>
                                            <label for="">Con cuanto cancelas</label> <br>
                                            <div class="form-floating mb-3 btn-1">
                                                <input type="text"  name="pay_cacelar"  placeholder="Con cuanto cancelas">
                                            </div>
                                            <br>
                                            <button type="submit" style="cursor: pointer; background-color: #c19d60; color: #fff; border: 1px solid #c19d60!important; height: 45px; width: 96px; border-radius: 6px">Pagar</button>
                                            <a href="#" class="modal__close_daviplata">Cerrar Modal</a>
                                        </form>

                                    </div>
                                </div>
                            </section>
                            <!--Modal nequi-->
                            <section class="modal_nequi">
                                <div class="modal__container_nequi">
                                    <img src="{{url('images/qr_nequi.png')}}" class="modal__img_nequi">
                                    <div class="grid-modal_nequi">
                                        <p class="modal__title-nequi">Nequi¡Estas a un paso de finalizar tu compra!</p>
                                        <p class="modal__title-nequi">Total de la compra: $ {{number_format(intval($total))}} COP</p>

                                        <form  enctype="multipart/form-data" class="custom-form-lg" action="{{route('pagar')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="method_pay" value="Nequi">
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                                            <label for="">Dirección de recidencia</label> <br>
                                            <div class="form-floating mb-3 btn-1">
                                                <input type="text"  name="address_bill"  placeholder="Dirección de recidencia" value="{{auth()->user()->address}}">
                                            </div>
                                            <label for="">Comprobante de pago</label> <br>
                                            <div class="form-floating mb-3 btn-1">
                                                <input required type="file"  name="checkout_img" >
                                            </div>
                                            <br>
                                            <button type="submit" style="cursor: pointer; background-color: #c19d60; color: #fff; border: 1px solid #c19d60!important; height: 45px; width: 96px; border-radius: 6px">Pagar</button>
                                            <a href="#" class="modal__close_nequi">Cerrar Modal</a>
                                        </form>

                                    </div>
                                </div>
                            </section>
                        @endif
                        <!-- /CART TOTALS  -->
                    </div>
                </div>
                <!-- /CHECKOUT TABLE -->
            </div>
            <div class="section-bg">
                <div class="bg"  data-bg="./Restabook/images/section-bg.png"></div>
            </div>
        </section>



        <!--  section end  -->
        <div class="brush-dec2 brush-dec_bottom"></div>
    </div>
@endsection
@section('style')
    <style>




        .modal_pagocontra {
            text-align: left !important;
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

        .modal--show_pagocontra{
            opacity: 1;
            pointer-events: unset;
            transition: opacity .6s;
            --transform: translateY(0);
            --transition: transform .8s .8s;
            z-index: 22;
        }

        .modal__container_pagocontra{
            text-align: left!important;

            margin: auto;
            width: 90%;
            max-width: 600px;
            max-height: 90%;
            background-color: #fff;
            border-radius: 6px;
            padding: 4em 2.5em;
            display: flex;
            gap: 1em;
            place-items: center;
            grid-auto-columns: 100%;
            transform: var(--transform);
            transition:var(--transition);
        }
        .grid-modal_pagocontra{
            display: grid;
            overflow-y: scroll;
            max-height: 150px;

        }

        .modal__title_pagocontra{
            font-size: 2.5rem;
        }

        .modal__title-special{
            font-size: 33px!important;
        }
        .modal__title-total{
            font-size: 17px!important;
        }

        .modal__paragraph_pagocontra{
            margin-bottom: 10px;
        }

        .modal__img_pagocontra{
            width: 190px;
            height: 190px;
            max-width: 300px;
        }

        .modal__close_pagocontra{
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

        .modal__close_pagocontra:hover{
            color: #F26250;
            background-color: #fff;
        }

        @media (max-width:800px) {
            .modal__container_pagocontra{
                padding: 2em 1.5em;
            }

            .modal__title_pagocontra{
                font-size: 1.5rem;
            }
        }


        /*daviplata*/
        .modal_daviplata{
            text-align: left!important;
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

        .modal--show_daviplata{
            opacity: 1;
            pointer-events: unset;
            transition: opacity .6s;
            --transform: translateY(0);
            --transition: transform .8s .8s;
            z-index: 22;
        }

        .modal__container_daviplata{
            text-align: left!important;

            margin: auto;
            width: 90%;
            max-width: 600px;
            max-height: 90%;
            background-color: #fff;
            border-radius: 6px;
            padding: 4em 2.5em;
            display: flex;
            gap: 1em;
            place-items: center;
            grid-auto-columns: 100%;
            transform: var(--transform);
            transition:var(--transition);
        }
        .grid-modal_daviplata{
            display: grid;
            overflow-y: scroll;
            max-height: 150px;

        }

        .modal__title_daviplata{
            font-size: 2.5rem;
        }

        .modal__title-daviplata{
            font-size: 33px!important;
        }
        .modal__title-daviplata{
            font-size: 17px!important;
        }

        .modal__paragraph_daviplata{
            margin-bottom: 10px;
        }

        .modal__img_daviplata{
            width: 190px;
            height: 190px;
            max-width: 300px;
        }

        .modal__close_daviplata{
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

        .modal__close_daviplata:hover{
            color: #F26250;
            background-color: #fff;
        }

        @media (max-width:800px) {
            .modal__container_daviplata{
                padding: 2em 1.5em;
            }

            .modal__title_daviplata{
                font-size: 1.5rem;
            }
        }

        /*Nequi*/
        .modal_nequi{
            text-align: left!important;
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

        .modal--show_nequi{
            opacity: 1;
            pointer-events: unset;
            transition: opacity .6s;
            --transform: translateY(0);
            --transition: transform .8s .8s;
            z-index: 22;
        }

        .modal__container_nequi{
            text-align: left!important;

            margin: auto;
            width: 90%;
            max-width: 600px;
            max-height: 90%;
            background-color: #fff;
            border-radius: 6px;
            padding: 4em 2.5em;
            display: flex;
            gap: 1em;
            place-items: center;
            grid-auto-columns: 100%;
            transform: var(--transform);
            transition:var(--transition);
        }
        .grid-modal_nequi{
            display: grid;
            overflow-y: scroll;
            max-height: 150px;

        }

        .modal__title_nequi{
            font-size: 2.5rem;
        }

        .modal__title-nequi{
            font-size: 33px!important;
        }
        .modal__title-nequi{
            font-size: 17px!important;
        }

        .modal__paragraph_nequi{
            margin-bottom: 10px;
        }

        .modal__img_nequi{
            width: 190px;
            height: 190px;
            max-width: 300px;
        }

        .modal__close_nequi{
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

        .modal__close_nequi:hover{
            color: #F26250;
            background-color: #fff;
        }

        @media (max-width:800px) {
            .modal__container_nequi{
                padding: 2em 1.5em;
            }

            .modal__title_nequi{
                font-size: 1.5rem;
            }
        }

    </style>
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
            z-index: 100;
            margin-top: 94px;
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
@endsection
@section('js')
    // SDK MercadoPago.js
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}");
        const bricksBuilder = mp.bricks();
        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: "{{$preference->id}}",
                redirectMode: "modal"
            },
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.alert.success').addClass("show");
            $('.alert.success').removeClass("hide");
            $('.alert.success').addClass("showAlert");
            setTimeout(function(){
                $('.alert.success').removeClass("show");
                $('.alert.success').addClass("hide");
            },5000);
        });
        $('.close-btn').click(function(){
            $(this).parent().removeClass("show");
            $(this).parent().addClass("hide");
        });
    </script>
    <script type="text/javascript">
        const openModal = document.querySelector('.hero__ctas_pagocontra');
        const modal = document.querySelector('.modal_pagocontra');
        const closeModal = document.querySelector('.modal__close_pagocontra');

        openModal.addEventListener('click', (e)=>{
            e.preventDefault();
            modal.classList.add('modal--show_pagocontra');
        });

        closeModal.addEventListener('click', (e)=>{
            e.preventDefault();
            modal.classList.remove('modal--show_pagocontra');
        });


        //daviplata
        const openModaldaviplata = document.querySelector('.hero__ctas_daviplata');
        const modaldaviplata = document.querySelector('.modal_daviplata');
        const closeModaldaviplata = document.querySelector('.modal__close_daviplata');

        openModaldaviplata.addEventListener('click', (e)=>{
            e.preventDefault();
            modaldaviplata.classList.add('modal--show_daviplata');
        });

        closeModaldaviplata.addEventListener('click', (e)=>{
            e.preventDefault();
            modaldaviplata.classList.remove('modal--show_daviplata');
        });

        //nequi
        const openModalnequi = document.querySelector('.hero__ctas_nequi');
        const modalnequi = document.querySelector('.modal_nequi');
        const closeModalnequi = document.querySelector('.modal__close_nequi');

        openModalnequi.addEventListener('click', (e)=>{
            e.preventDefault();
            modalnequi.classList.add('modal--show_nequi');
        });

        closeModalnequi.addEventListener('click', (e)=>{
            e.preventDefault();
            modalnequi.classList.remove('modal--show_nequi');
        });


        $(".cart_update").change(function (e) {
            e.preventDefault();

            var ele = $(this);
            var row = ele.closest("tr");
            var productId = row.attr("data-id");
            var quantity = ele.val();

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
                    quantity: quantity
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function (e) {
            e.preventDefault();

            var ele = $(this);
            var row = ele.closest("tr");
            var productId = row.attr("data-id");

            if (confirm("Seguro que desea eliminar este producto del carrito?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: productId
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
        $("textarea.order-comment").on("input", function (e) {
            e.preventDefault();

            var ele = $(this);
            var row = ele.closest("tr");
            var productId = row.attr("data-id");
            var comment = ele.val();

            $.ajax({
                url: '{{ route('update_comment') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
                    comment: comment
                },
                success: function (response) {
                    // Actualizar la interfaz o mostrar un mensaje de éxito si es necesario
                }
            });
        });

        $(".cart_edit").click(function (e) {
            e.preventDefault();

            var ele = $(this);
            var row = ele.closest("tr");
            var productId = row.attr("data-id");

            // Code for handling the edit functionality goes here

            // Example alert to show that the button click is being triggered
            alert("Se edito el comentario del producto: " + productId);
        });
    </script>
@endsection

