@extends('layouts.app')

@section('contenido')

</head>
<body>

<div class="card">

    <h1>Editar Usuario</h1>

    <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">

        @csrf
        @method('PUT')

        <input type="text" name="nombre" value="{{ $usuario->nombre }}" required>

        <input type="email" name="correo" value="{{ $usuario->correo }}" required>

        <input type="password" name="contrasena" placeholder="Nueva Contraseña">

        <select name="id_rol" required>

            @foreach($roles as $rol)
                <option value="{{ $rol->id_rol }}"
                    {{ $usuario->id_rol == $rol->id_rol ? 'selected' : '' }}>
                    {{ $rol->descripcion }}
                </option>
            @endforeach

        </select>

        <div class="botones">

            <button type="submit">
                Actualizar Usuario
            </button>

            <a href="{{ route('usuarios.index') }}" class="btn-cancelar">
                Cancelar
            </a>

        </div>
    </form>

</div>

@endsection
