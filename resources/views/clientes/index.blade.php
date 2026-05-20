@extends('layouts.app')

@section('contenido')

<div class="titulo">

    <h1>Clientes</h1>

    <a href="{{ route('clientes.create') }}" class="btn-nuevo">
        + Nuevo Cliente
    </a>

</div>

<div class="tabla">

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Razón Social</th>
                <th>RUC</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección Fiscal</th>
                <th>Estado</th>
                <th class="col-acciones">Acciones</th>
            </tr>

        </thead>

        <tbody>

            @forelse($clientes as $cliente)

            <tr>

                <td>
                    {{ $cliente->id_cliente }}
                </td>

                <td>
                    {{ $cliente->razon_social }}
                </td>

                <td>
                    {{ $cliente->ruc }}
                </td>

                <td>
                    {{ $cliente->telefono }}
                </td>

                <td>
                    {{ $cliente->correo }}
                </td>

                <td>
                    {{ $cliente->direccion_fiscal }}
                </td>

                <td>
                    {{ $cliente->estado }}
                </td>

                <td class="td-acciones">

                    <div class="acciones">

                        <a href="{{ route('clientes.edit', $cliente->id_cliente) }}"
                        class="btn-editar">
                            Editar
                        </a>

                        <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}"
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

            @empty

            <tr>

                <td colspan="8" style="text-align:center;">
                    NO HAY CLIENTES REGISTRADOS
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection