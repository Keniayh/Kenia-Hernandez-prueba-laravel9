<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>CRUD</h1>
    <div class="p-5 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">IMAGEN</th>
                    <th scope="col">PORCENTAJE</th>
                    <th scope="col">DIAS SEMANA</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item )
                <tr>
                    <th>{{$item->id}}</th>
                    <td>{{$item->estado}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->imagen}}</td>
                    <td>{{$item->porcentaje}}</td>
                    <td>{{$item->dias_semana}}</td>
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
