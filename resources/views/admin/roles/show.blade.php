@extends('layouts.app')
@section('title', 'ver Rol')
@section('content')
    <!--Migas de pan-->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Ver detalle del Rol</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!--Contenido- Formulario-->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-body">
                    <h1>Detalles del Rol: {{$role->name}}</h1>
                    <div class="col-12">
                        <div class=" row">
                            <label>Listado de Permisos asignados a este Rol:</label>

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-3">
                                        @foreach($role->permissions as $permission)
                                            <label for="">{{$permission->description}}</label>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
