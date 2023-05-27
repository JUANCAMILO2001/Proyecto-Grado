@extends('adminlte::page')

@section('title', 'Creación Usuario')

@section('content_header')
    <h1>Creación de Usuario</h1>
@stop

@section('content')
        <div class="card card-widget widget-user">

            <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{$user->names}} {{$user->lastnames}}</h3>
                <h5 class="widget-user-desc">{{$user->email}}</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/1200px-User_icon_2.svg.png" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Telefono</h5>
                            <span class="description-text">{{$user->phone}}</span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Estado</h5>
                            <span class="description-text">{{$user->state->name}}</span>
                        </div>

                    </div>

                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header">Compras</h5>
                            <span class="description-text">0</span>
                        </div>

                    </div>

                </div>
                <div class="d-flex justify-content-center form-group">
                    <a href="{{route('admin.users.index')}}" class="btn btn-danger btn-lg">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
@stop

