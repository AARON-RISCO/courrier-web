@extends('layouts.app')

@section('contenido')


<div class="card">

    <div class="titulo">
        <h1>Nuevo Usuario</h1>
    </div>

    <form action="{{ route('usuarios.store') }}" method="POST">

        @csrf

        <input type="text"
        name="nombre"
        placeholder="Nombre"
        required>

        <input type="email"
        name="correo"
        placeholder="Correo"
        required>

        <input type="password"
        name="contrasena"
        placeholder="Contraseña"
        required>

        <select name="id_rol" required>

            <option value="">
                Seleccione Rol
            </option>

            @foreach($roles as $rol)

                <option value="{{ $rol->id_rol }}">
                    {{ $rol->descripcion }}
                </option>

            @endforeach

        </select>

        <div class="botones">

            <button type="submit">
                Registrar Usuario
            </button>

            <a href="{{ route('usuarios.index') }}" class="btn-cancelar">
                Cancelar
            </a>

        </div>
        

    </form>

</div>

@endsection