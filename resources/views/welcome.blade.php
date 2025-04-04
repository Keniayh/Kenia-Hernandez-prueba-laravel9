<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/YOUR-FONT-AWESOME-CODE.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Menú lateral -->
            <nav class="col-md-2 col-lg-2 d-none d-md-block sidebar">
                <h4 class="menu">Menú</h4>
                <a href="#"><i class="fa-solid fa-house"></i> Inicio</a>

                <!-- Botón de Perfil con Dropdown -->
                <div class="dropdown dropend">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-user"></i> Perfil
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="cargarModulos('usuario')">Usuario</a></li>
                        <li><a class="dropdown-item" href="#" onclick="cargarModulos('admin')">Admin</a></li>
                    </ul>
                </div>

                <a href="#"><i class="fa-solid fa-gear"></i> Configuración</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
            </nav>

            <!-- Contenido principal -->
            <main class="col-md-10 col-lg-10 px-4">
                <div class="row g-4" id="modulos-container">
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function cargarModulos(tipo) {
            const contenedor = document.getElementById('modulos-container');
            contenedor.innerHTML = ""; // Limpiar módulos anteriores

            let modulos = [];
            let enunciado = "";

            if (tipo === "usuario") {

                enunciado = '<h2 class="text-center my-4">Selecciona un Módulo</h2>';

                modulos = [{
                        nombre: "Módulo 1",
                        imagen: "modulo1.png",
                        enlace: "enlace1.html"
                    },
                    {
                        nombre: "Módulo 2",
                        imagen: "modulo2.png",
                        enlace: "enlace2.html"
                    },
                    {
                        nombre: "Módulo 3",
                        imagen: "modulo3.png",
                        enlace: "enlace3.html"
                    },
                    {
                        nombre: "Módulo 4",
                        imagen: "modulo4.png",
                        enlace: "enlace4.html"
                    },
                    {
                        nombre: "Módulo 5",
                        imagen: "modulo5.png",
                        enlace: "enlace5.html"
                    },
                    {
                        nombre: "Módulo 6",
                        imagen: "modulo6.png",
                        enlace: "enlace6.html"
                    }
                ];
            } else if (tipo === "admin") {

                enunciado = '<h2 class="text-center my-4">Selecciona un Módulo</h2>';

                modulos = [{
                        nombre: "Usuarios",
                        imagen: '<i class="fa-solid fa-user fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "enlace1.html"
                    },
                    {
                        nombre: "Usuarios clientes",
                        imagen: '<i class="fa-solid fa-house-user fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "enlace2.html"
                    },
                    {
                        nombre: "Direcciones de usuarios",
                        imagen: '<i class="fa-solid fa-location-dot fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "enlace3.html"
                    },
                    {
                        nombre: "Tiendas",
                        imagen: '<i class="fa-solid fa-store fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "{{ route('tienda.index') }}"
                    },
                    {
                        nombre: "Diastancia de tiendas",
                        imagen: '<i class="fa-solid fa-map-location-dot fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "enlace5.html"
                    },
                    {
                        nombre: "Promociones",
                        imagen: '<i class="fa-solid fa-percent fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "{{ route('promocion.index') }}"
                    },
                    {
                        nombre: "Promociones de tiendas",
                        imagen: '<i class="fa-solid fa-cash-register fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "{{ route('tienda.index') }}"
                    },
                    {
                        nombre: "Productos",
                        imagen: '<i class="fa-solid fa-boxes-stacked fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "enlace8.html"
                    },
                    {
                        nombre: "Productos de tiendas",
                        imagen: '<i class="fa-solid fa-cart-flatbed fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "enlace9.html"
                    },
                    {
                        nombre: "Carritos",
                        imagen: '<i class="fa-solid fa-cart-shopping fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "enlace10.html"
                    },
                    {
                        nombre: "Pedidos",
                        imagen: '<i class="fa-solid fa-clipboard-list fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "enlace11.html"
                    },
                    {
                        nombre: "Estado de los pedidos",
                        imagen: '<i class="fa-solid fa-clipboard-list fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "enlace12.html"
                    },
                    {
                        nombre: "Productos pedidos",
                        imagen: '<i class="fa-solid fa-truck-ramp-box fa-3x" style="color: #74C0FC; margin:1vw;"></i>',
                        enlace: "enlace13.html"
                    }
                ];
            }

            if (enunciado) {
                const enunciadoContenedor = document.createElement('div');
                enunciadoContenedor.innerHTML = enunciado;
                contenedor.appendChild(enunciadoContenedor);
            }
            // Generar módulos dinámicamente
            modulos.forEach(modulo => {
                const col = document.createElement('div');
                col.classList.add('col-md-3', 'col-sm-6');
                col.innerHTML = `
            <div class="module-card">
                <div>${modulo.imagen}</div>
                <h6>${modulo.nombre}</h6>
                <a href="${modulo.enlace}" class="btn btn-primary btn-sm">Ir</a>
            </div>
        `;
                contenedor.appendChild(col);
            });
        }
    </script>

</body>

</html>
