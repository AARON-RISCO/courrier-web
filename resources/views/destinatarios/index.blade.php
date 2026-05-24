    @extends('layouts.app')

    @section('contenido')

    <div class="titulo">

        <h1>Destinatarios</h1>

        <a href="{{ route('destinatarios.create') }}" class="btn-nuevo">
            + Nuevo Destinatario
        </a>

    </div>

    <div class="tabla">

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Distrito</th>
                    <th>Referencia</th>
                    <th class="col-acciones">Acciones</th>
                </tr>

            </thead>

            <tbody>

                @forelse($destinatarios as $destinatario)

                <tr>

                    <td>
                        {{ $destinatario->id_cliente_destinatario }}
                    </td>

                    <td>
                        {{ $destinatario->nombre }}
                    </td>

                    <td>
                        {{ $destinatario->telefono }}
                    </td>

                    <td>
                        {{ $destinatario->correo }}
                    </td>
                    
                    <td>
                        {{ $destinatario->direccion }}
                    </td>

                    <td>
                        {{ $destinatario->distrito->nombre ?? 'SIN DISTRITO' }}
                    </td>
                    
                    <td>
                        {{ $destinatario->referencia }}
                    </td>

                    <td class="td-acciones">

                        <div class="acciones">

                            <a href="{{ route('destinatarios.edit', $destinatario->id_cliente_destinatario) }}"
                            class="btn-editar">
                                Editar
                            </a>

                            <form action="{{ route('destinatarios.destroy', $destinatario->id_cliente_destinatario) }}"
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

                    <td colspan="7" style="text-align:center;">
                        NO HAY DESTINATARIOS REGISTRADOS
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @endsection