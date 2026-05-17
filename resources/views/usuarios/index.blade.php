@extends('layouts.app')

@section('contenido')


<div class="titulo">

    <h1>Usuarios</h1>

    <a href="{{ route('usuarios.create') }}" class="btn-nuevo">
        + Nuevo Usuario
    </a>

</div>

<div class="tabla">

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th class="col-acciones">Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach($usuarios as $usuario)

            <tr>

                <td>{{ $usuario->id_usuario }}</td>

                <td>{{ $usuario->nombre }}</td>

                <td>{{ $usuario->correo }}</td>

                <td>{{ $usuario->rol->descripcion }}</td>

                <td class="td-acciones">

                    <div class="acciones">

                        <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}"
                        class="btn-editar">
                            Editar
                        </a>

                        <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}"
                        method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-eliminar">
                                Eliminar
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection