@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa-solid fa-tag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" title="Listado de Productos">Listado de Productos</span>
                    <span class="info-box-number">1</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" title="Listado de pedidos pendientes">Listado de pedidos pendientes</span>
                    <span class="info-box-number">4</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="text-white fa-solid fa-circle-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" title="Listado de pedidos Entregados">Listado de pedidos Entregados</span>
                    <span class="info-box-number">13</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fa-solid fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Listado de usuarios</span>
                    <span class="info-box-number">123</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-indigo"><i class="fa-solid fa-users-gear"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Listado de roles</span>
                    <span class="info-box-number">23</span>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
@stop

