@extends('adminlte::page')

@section('title', 'Listar Usuarios')

@section('content_header')
    <h1>Lista de Usuario Creados</h1>
@stop

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <a href="{{route('admin.users.create')}}" class="card-title" style="cursor: pointer;" title="Crear un Usuario"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->names}}</td>
                            <td>{{$user->lastnames}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->state->name}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <form method="post" action="{{route('admin.users.destroy', $user)}}" id="eliminarusuario_{{ $loop->iteration }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a title="Eliminar Usuario" onclick="document.getElementById('eliminarusuario_{{ $loop->iteration }}').submit()" class="  btn btn-danger btn-company-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <a title="Editar Usuario" href="{{route('admin.users.edit',$user)}}"
                                       class="me-2 btn btn-warning btn-company-danger">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a title="Detalles Usuario" href="{{route('admin.users.show',$user)}}"
                                       class=" btn btn-success"><i class="fas fa-eye"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
@stop

