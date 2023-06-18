@extends('layouts.app')
@section('title', 'Editar Usuario')
@section('content')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin.dashboard')}}">Inicio</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Crear Usuario</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Crear Usuario</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">

                <ul class="navbar-nav d-flex justify-content-end">


                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> from Laur
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="../assets/img/small-logos/logo-spotify.svg"
                                                class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New album</span> by Travis Scott
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewbox="0 0 43 36" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background"
                                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                    opacity="0.593633743"></path>
                                                                <path class="color-background"
                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Payment successfully completed
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
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
                            <select class=" form-select custom-select form-control-border border-width-2" name="document_type" style="width: 50%!important;">
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
                        <select class="form-select custom-select form-control-border border-width-2" name="state_id" id="state_user">
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


        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            Hecho por <i class="fa fa-heart"></i>
                            <a href="https://www.lckm-innovaty.com" class="font-weight-bold" target="_blank">
                                LCKM INNOVATY</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

@endsection

