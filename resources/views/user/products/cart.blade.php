@extends('layouts.guest')
@section('title', 'Carrito de compra')
@section('content')
    <!-- content  -->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
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
                                        <th>Cantidad</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $total = 0 @endphp
                                    @foreach(session('cart') as $id => $details)
                                        @php $total += $details['pay'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <td>
                                                <a><img src="public{{Storage::url($details['imagen'])}}" class="respimg"></a>
                                            </td>
                                            <td>
                                                <h5 class="product-name">{{$details['name']}}</h5>
                                            </td>
                                            <td>
                                                <h5 class="order-money">${{number_format(intval($details['pay']))}}</h5>
                                            </td>
                                            <td>
                                                <h5 class="order-money">${{ number_format(intval($details['pay'] * $details['quantity'])) }}</h5>
                                            </td>
                                            <td>
                                                <input type="number" name="quantity" id="quantity" value="{{ $details['quantity'] }}" min="1" class="order-count cart_update">
                                            </td>
                                            <td class="pr-remove">
                                                <input type="hidden" value="1" id="id" name="id">
                                                <button class="cart_remove" title="Eliminar"><i class="material-symbols-outlined">close</i></button>
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
                                <button type="submit" class="cart-totals_btn color-bg">Pagar el Carrito</button>
                            </div>
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
@section('js')
    <script type="text/javascript">
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
    </script>
@endsection
