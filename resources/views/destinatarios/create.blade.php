@extends('layouts.app')

@section('contenido')


<div class="card">

    <div class="titulo">
        <h1>Nuevo Destinatario</h1>
    </div>

    <form action="{{ route('destinatarios.store') }}" method="POST">

        @csrf

        <input type="text"
        name="nombre"
        placeholder="Nombre completo"
        required>

        <input type="text"
        name="telefono"
        placeholder="Teléfono"
        required>

        <input type="email"
        name="correo"
        placeholder="Correo">

        <select name="id_distrito" id="distrito" required>

            <option value="">
                Seleccione distrito
            </option>

            @foreach($distritos as $distrito)

                <option
                    value="{{ $distrito->id_distrito }}"
                    data-provincia="{{ $distrito->provincia->nombre }}"
                    data-departamento="{{ $distrito->provincia->departamento->nombre }}"
                >
                    {{ $distrito->nombre }}
                </option>

            @endforeach

        </select>
    <input type="text" id="provincia" placeholder="Provincia" readonly>

<input type="text" id="departamento" placeholder="Departamento" readonly>

<textarea
name="direccion"
placeholder="Dirección completa"
required>
</textarea>

<textarea
name="referencia"
placeholder="Referencia">
</textarea>

        <div class="botones">

            <button type="submit">
                Registrar Destinatario
            </button>

            <a href="{{ route('destinatarios.index') }}"
            class="btn-cancelar">
                Cancelar
            </a>

        </div>

    </form>

</div>

<script>

    const distrito = document.getElementById('distrito');

    distrito.addEventListener('change', function(){

        const option = this.options[this.selectedIndex];

        document.getElementById('provincia').value =
            option.dataset.provincia || '';

        document.getElementById('departamento').value =
            option.dataset.departamento || '';

    });

</script>

@endsection