@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario: {{$user->names}}</h1>
@stop

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.users.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="names">Nombres del usuario</label>
                        <input required type="text" value="{{$user->names}}" class="form-control form-control-border border-width-2" id="names" name="names" placeholder="Nombres del usuario *">
                    </div>
                    <div class="form-group">
                        <label for="lastnames">Apellidos del usuario</label>
                        <input required value="{{$user->lastnames}}" type="text" class="form-control form-control-border border-width-2" id="lastnames" name="lastnames" placeholder="Apellidos del usuario *">
                    </div>
                    <div class="form-group">
                        <label for="lastnames">Tipo y numero de documento del Usuario</label>
                        <div class="d-flex">
                            <select class="custom-select form-control-border border-width-2" name="document_type" style="width: 50%!important;">
                                <option value="{{$user->document_type}}" selected>{{$user->document_type}}</option>
                                <option value="tarjeta_identidad">Tarjeta Identidad</option>
                                <option value="cedula_ciudadania">Cédula Ciudadania</option>
                                <option value="cedula_extranjeria">Cédula Extranjeria</option>
                                <option value="pasaporte">Pasaporte</option>
                            </select>
                            <input required type="text" value="{{$user->document_number}}" class="form-control form-control-border border-width-2" id="document_number" name="document_number" placeholder="Numero Documento *">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono del usuario</label>
                        <input required type="text" value="{{$user->phone}}" class="form-control form-control-border border-width-2" id="phone" name="phone" placeholder="Telefono del usuario *">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo del usuario</label>
                        <input required type="email" value="{{$user->email}}" class="form-control form-control-border border-width-2" id="email" name="email" placeholder="Correo del usuario *">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña del usuario</label>
                        <input required type="password" class="form-control form-control-border border-width-2" id="password" name="password" placeholder="Contraseña del usuario *">
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmar contraseña del usuario</label>
                        <input required type="password" class="form-control form-control-border border-width-2" id="password" name="password" placeholder="Confirmar contraseña del usuario *">
                    </div>
                    <div class="form-group">
                        <label for="state_user">Estado del usuario</label>
                        <select class="custom-select form-control-border border-width-2" name="state_id" id="state_user">
                            <option value="{{$user->state->id}}" selected>{{$user->state->name}}</option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Editar Usuario</button>
                        <a href="{{route('admin.users.index')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
@stop

