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

                    // Crea un objeto de preferencia
                    $preference = new MercadoPago\Preference();

                    // Crea un ítem en la preferencia
                    $item = new MercadoPago\Item();
                    $item->title = 'Mi producto';
                    $item->quantity = 1;
                    $item->unit_price = 75;
                    $preference->items = array($item);
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
                                                <input type="hidden" value="1" id="id" name="id">
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
                                <div id="wallet_container"></div>
                            </div>
                            <section class="modal ">
                                <div class="modal__container">
                                    <img src="{{url('images/scooter-de-entrega.gif')}}" class="modal__img">
                                    <div class="grid-modal">
                                        <p class="modal__title">¡Estas a un paso de finalizar tu compra!</p>
                                        <p class="modal__title">Total de la compra: $ {{number_format(intval($total))}} COP</p>
                                        <label for="">Dirección de recidencia</label>
                                        <input type="text" >
                                        <br>
                                        <label for="">Con cuanto cancelas</label>
                                        <input type="text">
                                        <a href="#" class="modal__close">Cerrar Modal</a>
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
            z-index: 22;
        }

        .modal__container{
            margin: auto;
            width: 90%;
            max-width: 600px;
            max-height: 90%;
            background-color: #fff;
            border-radius: 6px;
            padding: 3em 2.5em;
            display: flex;
            gap: 1em;
            place-items: center;
            grid-auto-columns: 100%;
            transform: var(--transform);
            transition:var(--transition);
        }
        .grid-modal{
            display: grid;

        }

        .modal__title{
            font-size: 2.5rem;
        }

        .modal__paragraph{
            margin-bottom: 10px;
        }

        .modal__img{
            width: 190px;
            height: 190px;
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
        //Agrega credenciales de SDK
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}");
        const bricksBuilder = mp.bricks();

        //Inicializa el checkout
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
        const openModal = document.querySelector('.hero__ctas');
        const modal = document.querySelector('.modal');
        const closeModal = document.querySelector('.modal__close');

        openModal.addEventListener('click', (e)=>{
            e.preventDefault();
            modal.classList.add('modal--show');
        });

        closeModal.addEventListener('click', (e)=>{
            e.preventDefault();
            modal.classList.remove('modal--show');
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

