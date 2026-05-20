<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - FastDeliveries</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
 
    @vite([
    'resources/css/app.css',
    'resources/css/index.css',
    'resources/js/app.js'
    ])

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="dashboard">

    <!-- SIDEBAR -->

    <div class="sidebar" id="sidebar">

        <div class="logo">
            <img src="{{ asset('img/logo.png') }}">
        </div>

        <div class="menu">

            <a href="{{ route('dashboard') }}">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="#">
                <i class="fa-solid fa-box"></i>
                <span>Envíos</span>
            </a>

            <a href="#">
                <i class="fa-solid fa-map-location-dot"></i>
                <span>Lugares</span>
            </a>

            <a href="#">
                <i class="fa-solid fa-route"></i>
                <span>Rutas</span>
            </a>

            <a href="#">
                <i class="fa-solid fa-truck"></i>
                <span>Repartidores</span>
            </a>

            <a href="#">
                <i class="fa-solid fa-users"></i>
                <span>Clientes</span>
            </a>
            <a href="{{ route('destinatarios.index') }}">
                <i class="fa-solid fa-location-dot"></i>
                <span>Destinatarios</span>
            </a>

            <a href="#">
                <i class="fa-solid fa-warehouse"></i>
                <span>Almacén</span>
            </a>

            <a href="#">
                <i class="fa-solid fa-money-bill-wave"></i>
                <span>Pagos</span>
            </a>

            <a href="#">
                <i class="fa-solid fa-chart-line"></i>
                <span>Reportes</span>
            </a>

           @if(Auth::user()->rol->descripcion == 'Administrador')

            <a href="{{ route('usuarios.index') }}">
                <i class="fa-solid fa-user-shield"></i>
                <span>Usuarios</span>
            </a>
         @endif
         
            <a href="#">
                <i class="fa-solid fa-gear"></i>
                <span>Configuración</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn-logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Cerrar Sesión</span>
                </button>
            </form>

        </div>

    </div>

    <!-- CONTENIDO -->

    <div class="contenido">

        <!-- TOPBAR -->

        <div class="topbar">

            <button class="btn-menu" id="btnMenu">
                ☰
            </button>

          <div class="usuario">
                {{ Auth::user()->nombre }} - {{ Auth::user()->rol?->descripcion ?? 'SIN ROL' }} 🚀
            </div>

        </div>
        @yield('contenido')

    </div>

</div>

<script>

    const btnMenu = document.getElementById('btnMenu');
    const sidebar = document.getElementById('sidebar');

    btnMenu.addEventListener('click', () => {
        sidebar.classList.toggle('oculto');
    });

</script>

</body>
</html>