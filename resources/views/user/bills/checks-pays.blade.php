@extends('layouts.guest')
@section('title', 'Confirmación de pedido')
@section('content')
    <div class="content">
        <!--  section  -->
        <section class="hidden-section big-padding con-sec" data-scrollax-parent="true" id="sec3">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="section-title text-align_left">
                            <h2>Confirmación del Pedido - <span style="background: {{$bill->state->color}}; padding: 0px 8px 1px 6px; border-radius: 6px; color: #fff">{{$bill->state->name}}</span></h2>
                            <div class="dots-separator fl-wrap"><span></span></div>
                        </div>
                        <div class="contactform-wrap">
                            <div id="message"></div>
                            <form  class="custom-form"  id="contactform">
                                <fieldset>
                                    <div class="container">
                                        <div id="message2"></div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="">Dirección de residencia:</label>
                                                <input readonly disabled type="text" name="address" id="name2" placeholder="Dirección de residencia" value="{{$bill->address_bill}}"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Usuario que solicita:</label>
                                                <input readonly disabled type="text"  name="user_id" id="user_id" placeholder="Usuario que solicita:" value="{{$bill->user->names}} {{$bill->user->lastnames}}"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Metodo de pago:</label>
                                                <input readonly disabled type="text"  name="method_pay" id="method_pay" placeholder="Metodo de pago" value="{{$bill->method_pay}}"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Con cuanto cancelas:</label>
                                                <input readonly disabled type="text"  name="method_pay" id="method_pay" placeholder="Metodo de pago" value="{{$bill->pay_cacelar}}"/>
                                            </div>
                                        </div>
                                        <div class="table-cart">
                                            <table class="table table-border checkout-table">
                                                <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                    <th>Subtotal</th>
                                                    <th>Comentario</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($bill->products as $product)
                                                    @php
                                                        $productos = $product->bills()->getParent()
                                                    @endphp
                                                    <td>{{$product->pivot->name}}</td>
                                                    <td>$ {{number_format(intval($productos->pay))}}</td>
                                                    <td>$ {{number_format(intval($product->pivot->subtotal))}}</td>
                                                    <td>{{$product->pivot->description}}</td>
                                                    <td>{{$product->pivot->quantity}}</td>

                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="section-dec sec-dec_top"></div>
                    </div>
                    <div class="col-md-5">
                        <div class="column-text_inside fl-wrap dark-bg" >
                            <div class="column-text">
                                <div class="section-title">
                                    <h4>Llame para Peticion, Queja, Recurso.</h4>
                                    <h2>Horario Apertura</h2>
                                    <div class="dots-separator fl-wrap"><span></span></div>
                                </div>
                                <div class="work-time fl-wrap">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Lunes a Viernes</h3>
                                            <div class="hours">
                                                04:30 PM<br>
                                                10:00 PM
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Sabados y Domingos</h3>
                                            <div class="hours">
                                                4:00 PM<br>
                                                11:30 PM
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="bold-separator"><span></span></div>
                                <div class="big-number"><a href="#">+57 666999777</a></div>
                            </div>
                            <div class="illustration_bg">
                                <div class="bg"  data-bg="./Restabook/images/6.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-bg">
                <div class="bg"  data-bg="./Restabook/images/section-bg.png"></div>
            </div>
        </section>
        <!--  section end  -->
        <div class="brush-dec2 brush-dec_bottom"></div>
    </div>
@endsection
