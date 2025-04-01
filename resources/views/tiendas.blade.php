<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/128b3b0416.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <h1>Modulo Tiendas</h1>
    @if (session('Correcto'))
        <div class="alert alert-success">{{ session('Correcto') }}</div>
    @endif
    @if (session('Incorrecto'))
        <div class="alert alert-danger">{{ session('Incorrecto') }}</div>
    @endif
    <!-- Modal registro de tienda-->
    <div class="modal fade" id="staticBackdropTienda" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('tienda.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Estado:</label>
                            <input type="number" class="form-control" id="estado"
                                aria-describedby="emailHelp" name="estado"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombreM"
                                aria-describedby="emailHelp" name="nombre"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Descripción:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="descripcion"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Teléfono:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="telefono"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="direccion"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dirección anexo:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="direccionanexo"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dirección barrio:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="direccionbarrio"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Calificación:</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="calificacion"
                                step="0.01" min="-9.99" max="9.99" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Calificación cantidad:</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="calificacioncantidad"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Impuestos:</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="impuestos"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dias trabajados:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="diastrabajados"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="p-5 table-responsive">
        <button class="añadir" data-bs-toggle="modal" data-bs-target="#staticBackdropTienda">Añadir
            Tienda</button>
        <table id="tabla" class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">TELÉFONO</th>
                    <th scope="col">DIRECCIÓN</th>
                    <th scope="col">DIRECCIÓN ANEXO</th>
                    <th scope="col">DIRECCIÓN BARRIO</th>
                    <th scope="col">CALIFICACIÓN</th>
                    <th scope="col">CALIFICACIÓN CANTIDAD</th>
                    <th scope="col">IMPUESTOS</th>
                    <th scope="col">DIAS TRABAJADOS</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td class="text-center">{{ $item->estado }}</td>
                        <td class="text-center">{{ $item->nombre }}</td>
                        <td class="table-cell-scroll">{{ $item->descripcion }}</td>
                        <td class="text-center">{{ $item->telefono }}</td>
                        <td class="text-center">{{ $item->direccion }}</td>
                        <td class="text-center">{{ $item->direccion_anexo }}</td>
                        <td class="text-center">{{ $item->direccion_barrio }}</td>
                        <td class="text-center">{{ $item->calificacion }}</td>
                        <td class="text-center">{{ $item->calificacion_cantidad }}</td>
                        <td class="text-center">{{ $item->impuestos }}</td>
                        <td class="text-center">{{ $item->dias_trabajados }}</td>
                        <td class="text-center">
                            <a href="" data-bs-toggle="modal"
                                data-bs-target="#staticBackdropEdit{{ $item->id }}"
                                class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('tienda.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar esta tienda?');">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>

                        </td>

                        <!-- Modal modificar tienda -->
                        <div class="modal fade" id="staticBackdropEdit{{ $item->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modificar datos la
                                            tienda</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('tienda.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Estado:</label>
                                                <input type="number" class="form-control" id="estado"
                                                    aria-describedby="emailHelp" name="estado"
                                                    value="{{ $item->estado }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                                                <input type="text" class="form-control" id="nombreM"
                                                    aria-describedby="emailHelp" name="nombre"
                                                    value="{{ $item->nombre }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Descripción:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="descripcion"
                                                    value="{{ $item->descripcion }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Teléfono:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="telefono"
                                                    value="{{ $item->telefono }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Dirección:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="direccion"
                                                    value="{{ $item->direccion }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Dirección anexo:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="direccionanexo"
                                                    value="{{ $item->direccion_anexo }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Dirección barrio:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="direccionbarrio"
                                                    value="{{ $item->direccion_barrio }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Calificación:</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="calificacion"
                                                    value="{{ $item->calificacion }}" step="0.01" min="-9.99" max="9.99">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Calificación cantidad:</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="calificacioncantidad"
                                                    value="{{ $item->calificacion_cantidad }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Impuestos:</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="impuestos"
                                                    value="{{ $item->impuestos }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Dias trabajados:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="diastrabajados"
                                                    value="{{ $item->dias_trabajados }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Modificar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
