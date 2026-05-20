@extends('layouts.app')

@section('contenido')

<style>

.titulo{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.titulo h1{
    color:#0B5D3B;
    font-size:35px;
}

.btn-nuevo{
    background:#0B5D3B;
    color:white;
    padding:12px 20px;
    border-radius:5px;
    text-decoration:none;
    font-weight:bold;
    transition:0.3s;
}

.btn-nuevo:hover{
    background:#08462d;
}

.tabla{
    width:100%;
    background:white;
    border-radius:5px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

table{
    width:100%;
    border-collapse:collapse;
}

table thead{
    background:#0B5D3B;
    color:white;
}

table th,
table td{
    padding:18px;
    text-align:left;
}

table tbody tr{
    border-bottom:1px solid #eee;
}

table tbody tr:hover{
    background:#f8f8f8;
}

.col-acciones{
    width:220px;
    text-align:center;
}

.td-acciones{
    text-align:center;
}

.acciones{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:12px;
}

.acciones form{
    margin:0;
}

.btn-editar{
    background:#ffc107;
    color:black;
    padding:10px 18px;
    border-radius:5px;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
}

.btn-eliminar{
    background:#dc3545;
    color:white;
    padding:10px 18px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:14px;
    font-weight:600;
}

</style>

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