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
    <h1>Modulo Promociones</h1>
    @if (session('Correcto'))
        <div class="alert alert-success">{{ session('Correcto') }}</div>
    @endif
    @if (session('Incorrecto'))
        <div class="alert alert-danger">{{ session('Incorrecto') }}</div>
    @endif
    <!-- Modal registro de promos-->
    <div class="modal fade" id="staticBackdropPromo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('promocion.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Estado:</label>
                            <input type="number" class="form-control" id="exampleInputEstado"
                                aria-describedby="emailHelp" name="estado" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="exampleInputNombre"
                                aria-describedby="emailHelp" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Imagen:</label>
                            <input type="text" class="form-control" id="exampleInputImagen"
                                aria-describedby="emailHelp" name="imagen" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Porcentaje:</label>
                            <input type="number" class="form-control" id="exampleInputPorcentaje"
                                aria-describedby="emailHelp" name="porcentaje" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dias de la semana:</label>
                            <input type="text" class="form-control" id="exampleInputDS" aria-describedby="emailHelp"
                                name="diassemana" required>
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
        <button class="añadir" data-bs-toggle="modal" data-bs-target="#staticBackdropPromo">Añadir
            Promoción</button>
        <table id="tabla" class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">IMAGEN</th>
                    <th scope="col">PORCENTAJE</th>
                    <th scope="col">DIAS SEMANA</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td class="text-center">{{ $item->estado }}</td>
                        <td class="text-center">{{ $item->nombre }}</td>
                        <td class="table-cell-scroll">{{ $item->imagen }}</td>
                        <td class="text-center">{{ $item->porcentaje }}</td>
                        <td class="text-center">{{ $item->dias_semana }}</td>
                        <td class="text-center">
                            <a href="" data-bs-toggle="modal"
                                data-bs-target="#staticBackdropEdit{{ $item->id }}"
                                class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('promocion.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar esta promoción?');">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>

                        </td>

                        <!-- Modal modificar promoción -->
                        <div class="modal fade" id="staticBackdropEdit{{ $item->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modificar datos la
                                            promoción</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('promocion.update', $item->id) }}" method="POST">
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
                                                <label for="exampleInputEmail1" class="form-label">Imagen:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="imagen"
                                                    value="{{ $item->imagen }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Porcentaje:</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="porcentaje"
                                                    value="{{ $item->porcentaje }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Dias de la
                                                    semana:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="diassemana"
                                                    value="{{ $item->dias_semana }}">
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
