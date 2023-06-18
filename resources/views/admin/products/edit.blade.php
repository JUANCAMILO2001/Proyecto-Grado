@extends('layouts.app')
@section('title', 'Editar Producto')
@section('content')

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin.dashboard')}}">Inicio</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Editar Productos</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Editar Producto</h6>
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
        <div class="row ">
            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card z-index-2">
                        <img src="/public/{{Storage::url($product->imagen)}}" id="imagenSeleccionada" class="card-img-top img-fluid" width="278px" height="196px">
                        <div class="card-body p-3">
                            <h5 class="card-title font-weight-bold" id="resul_name_product">{{$product->name}}</h5>
                            <p class="card-text pt-3" id="resul_description_product">{{$product->description}}</p>
                            <div class="d-flex flex-row-reverse">
                                <p class="font-weight-bold">Precio:  <span id="resul_price_product">$ {{number_format(intval($product->pay))}}</span></p>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-8">
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Datos del Producto</h6>
                    </div>
                    <div class="card-body p-3">
                        <form action="{{route('admin.products.update', $product)}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')


                            <div class="mb-3">
                                <label for="imagen_producto" class="form-label">Seleccione una imagen:</label>
                                <input class="form-control" type="file" value="/public/{{Storage::url($product->image)}}" name="imagen" id="imagen_producto">
                            </div>

                            <div class="form-group">
                                <label for="nombre_producto">Nombre de su producto:</label>
                                <input onkeyup="show_name_product(this.value)" type="text" name="name" value="{{$product->name}}" class="form-control form-control-border" id="nombre_producto" name="nombre_producto" placeholder="Nombre de su Producto">
                            </div>
                            <div class="form-group">
                                <label for="descripcion_producto">Descripción de su producto:</label>
                                <textarea onkeyup="show_description_product(this.value)" name="description" class="form-control descricption-product" id="descripcion_producto" name="descripcion_producto" rows="3">{{$product->description}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="precio_producto">Precio de su producto:</label>
                                <input type="text" value="{{$product->pay}}" oninput="formatearNumero()" name="pay" class="form-control form-control-border" id="precio_producto" name="precio_producto" placeholder="Precio de su Producto">
                            </div>
                            <div class="form-group">
                                <label for="estado_id">Seleccionar el Estado para su Producto:</label>
                                <select onchange="mostrarValorSelect()" name="state_id" class="form-select custom-select form-control-border" name="company_id" id="company_id">
                                    <option value="{{$product->state->id}}" selected>{{$product->state->name}}</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-block bg-gradient-success btn-lg">Editar Producto</button>
                            <a href="{{route('admin.products.index')}}" class="btn btn-block bg-gradient-danger btn-lg">Cancelar</a>
                        </form>

                    </div>
                </div>
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

@section('js')
<script>
    $(document).ready(function (e) {
        $('#imagen_producto').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
    function show_impo(valor){
        document.getElementById("resul_ipoconsumo").innerHTML=valor + "%";
    }
    function show_name_product(valor){
        document.getElementById("resul_name_product").innerHTML=valor;
    }
    function show_description_product(valor){
        document.getElementById("resul_description_product").innerHTML=valor;
    }
    function show_price_product(valor){
        document.getElementById("resul_price_product").innerHTML="$" + valor + "COP";
    }
    function formatearNumero() {
        var input = document.getElementById('precio_producto');
        var valor = input.value;

        if (valor !== "") {
            var numero = parseFloat(valor);
            var numeroFormateado = numero.toLocaleString();
            var resultado = "$ " + numeroFormateado + " COP";
        } else {
            var resultado = "";
        }

        var resultadoElemento = document.getElementById('resul_price_product');
        resultadoElemento.textContent = resultado;
    }
    function mostrarValorSelect() {
        var select = document.getElementById('company_id');
        var valor = select.value;
        var resultado = document.getElementById('resul_company_product');

        if (valor !== "") {
            resultado.textContent =  valor;
        } else {
            resultado.textContent = "";
        }
    }
</script>
@endsection
