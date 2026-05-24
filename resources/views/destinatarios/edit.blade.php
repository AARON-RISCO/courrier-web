@extends('layouts.app')

@section('contenido')

<div class="card">

    <h1>Editar Destinatario</h1>

    <form action="{{ route('destinatarios.update', $destinatario->id_cliente_destinatario) }}" method="POST">

        @csrf
        @method('PUT')

        <input
            type="text"
            name="nombre"
            value="{{ $destinatario->nombre }}"
            placeholder="Nombre completo"
            required
        >

        <input
            type="text"
            name="telefono"
            value="{{ $destinatario->telefono }}"
            placeholder="Teléfono"
            required
        >

        <input
            type="email"
            name="correo"
            value="{{ $destinatario->correo }}"
            placeholder="Correo"
        >

        {{-- BUSCADOR DISTRITO --}}
        <input
            type="text"
            id="buscador-distrito"
            placeholder="Buscar distrito..."
            value="{{ $destinatario->distrito->nombre ?? '' }}"
        >

        <input
            type="hidden"
            name="id_distrito"
            id="id_distrito"
            value="{{ $destinatario->id_distrito }}"
        >

        <div id="lista-distritos" class="dropdown"></div>

        {{-- UBIGEO --}}
        <input
            type="text"
            id="provincia"
            placeholder="Provincia"
            readonly
            value="{{ $destinatario->distrito->provincia->nombre ?? '' }}"
        >

        <input
            type="text"
            id="departamento"
            placeholder="Departamento"
            readonly
            value="{{ $destinatario->distrito->provincia->departamento->nombre ?? '' }}"
        >

        <textarea
            name="direccion"
            placeholder="Dirección completa"
            required
        >{{ $destinatario->direccion }}</textarea>

        <textarea
            name="referencia"
            placeholder="Referencia"
        >{{ $destinatario->referencia }}</textarea>

        <div class="botones">

            <button type="submit">
                Actualizar Destinatario
            </button>

            <a href="{{ route('destinatarios.index') }}" class="btn-cancelar">
                Cancelar
            </a>

        </div>

    </form>

</div>

{{-- DISTRITOS --}}
<script>
const distritos = @json($distritos);
</script>

{{-- AUTOCOMPLETE --}}
<script>

const input = document.getElementById('buscador-distrito');
const lista = document.getElementById('lista-distritos');

input.addEventListener('input', function () {

    const value = this.value.toLowerCase();

    lista.innerHTML = '';

    if (value.length < 2) return;

    const filtrados = distritos.filter(d =>
        d.nombre.toLowerCase().includes(value)
    );

    filtrados.slice(0, 10).forEach(d => {

        const item = document.createElement('div');

        item.textContent = d.nombre;

        item.onclick = () => {

            input.value = d.nombre;

            document.getElementById('id_distrito').value =
                d.id_distrito;

            document.getElementById('provincia').value =
                d.provincia?.nombre || '';

            document.getElementById('departamento').value =
                d.provincia?.departamento?.nombre || '';

            lista.innerHTML = '';
        };

        lista.appendChild(item);

    });

});
</script>

@endsection