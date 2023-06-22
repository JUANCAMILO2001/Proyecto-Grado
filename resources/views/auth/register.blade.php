@extends('layouts.guest')
@section('title', 'Registrarse')
@section('content')
    <div class="content">
        <div id="wrapper">
            <!-- hero-wrap-->
            <div class="hero-wrap fl-wrap full-height">
                <div class="media-container">
                    <div class="video-container">
                        <video playsinline autoplay  loop muted  class="bgvid">
                            <source src="{{url('Restabook/video/v-pizza.mp4')}}" type="video/mp4">
                        </video>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>

        </div>

        <div class="container container-rg">
        <div class="container-rg2" style="">
            <div>
                <div class="section-title-login">
                    <h2>Registrarse</h2>
                    <div class="dots-separator-lg fl-wrap"><span></span></div>
                </div>
                <form class="custom-form-lg" action="{{route('register')}}" method="post">
                    @csrf
                    <!--input Nombre-->
                    <div class="form-floating mb-3 btn-1">
                        <input type="text"  name="names" id="names" placeholder="Nombres Completos *" required/>
                    </div>
                    <!--input apellidos-->
                    <div class="form-floating mb-3 btn-1">
                        <input type="text"  name="lastnames" id="lastnames" placeholder="Apellidos Completos *" required/>
                    </div>
                    <!--input Tipo y numero documento-->
                    <div class="form-floating mb-3 btn-1" style="width: 90%; margin-left: 19px">
                        <div style="display: flex">
                            <select name="document_type" id="document_type" style="height: 50px; border: 1px solid #e1e1e1; ">
                                <option selected>--Tipo Documento--</option>
                                <option value="tarjeta_identidad">Tarjeta Identidad</option>
                                <option value="cedula_ciudadania">Cédula Ciudadania</option>
                                <option value="cedula_extranjeria">Cédula Extranjeria</option>
                                <option value="pasaporte">Pasaporte</option>
                            </select>
                            <input type="text"  name="document_number" id="document_number" placeholder="Numero documento *"  required/>
                        </div>
                    </div>

                    <!--input Number Addresss-->
                    <div class="form-floating mb-3 btn-1">
                        <input type="text"  name="address" id="address" placeholder="Direccion de recidencia *"  required/>
                    </div>

                    <!--input Number Telefono-->
                    <div class="form-floating mb-3 btn-1">
                        <input type="text"  name="phone" id="phone" placeholder="Numero Celular *"  required/>
                    </div>
                    <!--input email-->
                    <div class="form-floating mb-3 btn-1">
                        <input type="email"  name="email" id="email" placeholder="Correo Electronico *"  required/>
                    </div>
                    <!--input password-->
                    <div class="form-floating btn-1">
                        <input type="password"  name="password" id="password" placeholder="Contraseña *"  required/>
                    </div>
                    <!--input password confirm-->
                    <div class="form-floating btn-1">
                        <input type="password"  name="password" id="password" placeholder="Confirmar Contraseña *"  required/>
                    </div>
                    <!--Boton de Iniciar sesion-->
                    <div class="d-grid gap-2 btn-2">
                        <button type="submit" class="btn-rg border-btn-rg">Registrarse<i class="fal fa-long-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
