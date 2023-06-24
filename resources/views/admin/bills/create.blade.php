@extends('layouts.app')
@section('title', 'Pedidos pendientes')
@section('content')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
         navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin.dashboard')}}">Inicio</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Crear pedido</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Crear pedido</h6>
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

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="card">
            <form action="{{route('admin.bills.store')}}" method="post">
                @csrf
                <div class="card-body table-responsive">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="method_pay">Metodo de pago</label>
                                    <select name="method_pay" id="method_pay" class="form-select" aria-label="Default select example">
                                        <option selected>Seleccione metodo de pago</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Nequi">Nequi</option>
                                        <option value="Daviplata">Daviplata</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pay_cancelar" class="form-label">Con cuato cancela</label>
                                    <input type="text" class="form-control" name="pay_cancelar" id="pay_cancelar" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="user_id">Usuario para su pedido</label>
                                    <select name="user_id" id="user_id" class="form-select" aria-label="Default select example">
                                        <option selected>Seleccione un usuario</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->names}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="address_bill" class="form-label">dirreccion del pedido</label>
                                    <input type="text" class="form-control" name="address_bill" id="address_bill" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="state_id">Estado de la compra</label>
                                    <input type="hidden" value="4" class="form-control" name="state_id" id="state_id" aria-describedby="emailHelp">
                                    <input type="text" disabled readonly value="Pendiente" class="form-control" name="" id="" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="product_id">Productos para su pedido</label>
                                    <select id="product-table-select" name="products[][product_id]" class="form-select" aria-label="Default select example">
                                        <option selected>Seleccione un Producto</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}" data-price="{{$product->pay}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-product-btn" class="float-end btn btn-primary">Agregar producto</button>

                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody id="product-table-body"></tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-success">Crear pedido</button>
            </form>
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
        // Obtener referencias a los elementos del DOM
        const addProductBtn = document.getElementById('add-product-btn');
        const productSelect = document.getElementById('product-table-select')


        const productTableBody = document.getElementById('product-table-body');
        const selectedProducts = []; // Array para almacenar los productos seleccionados

        // Manejar el evento click del botón "Agregar producto"
        addProductBtn.addEventListener('click', function () {
            // Obtener los datos seleccionados del producto
            const option = productSelect.options[productSelect.selectedIndex];
            const productId = option.value;
            const productName = option.text;
            const productPrice = option.dataset.price; // Obtener el precio del producto del atributo data-price

            // Validar si se ha seleccionado un producto
            if (productId === "") {
                alert('Por favor, seleccione un producto.');
                return;
            }

            // Validar si el producto ya ha sido seleccionado
            if (selectedProducts.includes(productId)) {
                alert('El producto ya ha sido seleccionado.');
                return;
            }

            // Agregar el ID del producto al array de productos seleccionados
            selectedProducts.push(productId);

            // Crear una nueva fila de la tabla con los datos del producto
            const newRow = document.createElement('tr');

            const nameCell = document.createElement('td');
            nameCell.textContent = productName;
            newRow.appendChild(nameCell);

            const priceCell = document.createElement('td');
            priceCell.textContent = productPrice; // Agrega el precio del producto
            newRow.appendChild(priceCell);

            const quantityCell = document.createElement('td');
            const quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.className = 'form-control';
            quantityInput.value = '1';
            quantityInput.min = '0'; // Establecer el mínimo a 0 para evitar números negativos
            quantityCell.appendChild(quantityInput);
            newRow.appendChild(quantityCell);

            const subtotalCell = document.createElement('td');
            const updateSubtotal = () => {
                const quantity = parseInt(quantityInput.value);
                const subtotal = parseFloat(productPrice) * quantity; // Calcula el subtotal
                subtotalCell.textContent =  subtotal.toFixed(0); // Agrega el subtotal del producto sin decimales
            };
            quantityInput.addEventListener('input', updateSubtotal);
            updateSubtotal();
            newRow.appendChild(subtotalCell);

            const actionsCell = document.createElement('td');
            // Agrega los botones de acciones (por ejemplo, eliminar producto) aquí
            const deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'btn btn-danger';
            deleteButton.textContent = 'Eliminar';
            deleteButton.addEventListener('click', function () {
                newRow.remove(); // Eliminar la fila al hacer clic en el botón "Eliminar"
                const index = selectedProducts.indexOf(productId);
                if (index !== -1) {
                    selectedProducts.splice(index, 1); // Eliminar el producto del array de productos seleccionados
                }
            });
            actionsCell.appendChild(deleteButton);
            newRow.appendChild(actionsCell);

            // Agregar la fila a la tabla
            productTableBody.appendChild(newRow);

            // Restablecer el valor seleccionado en el select de productos
            productSelect.value = "";
        });
    </script>
@endsection

