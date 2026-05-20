@extends('layouts.app')

@section('contenido')


<div class="card">

    <div class="titulo">
        <h1>Nuevo Destinatario</h1>
    </div>

    <form action="{{ route('destinatarios.store') }}" method="POST">
        @csrf

        <input type="text" name="nombre" placeholder="Nombre completo" required>

        <input type="text" name="telefono" placeholder="Teléfono" required>

        <input type="email" name="correo" placeholder="Correo">

        {{-- BUSCADOR --}}
        <input type="text" id="buscador-distrito" placeholder="Buscar distrito...">

        <input type="hidden" name="id_distrito" id="id_distrito">

        <div id="lista-distritos" class="dropdown"></div>

        {{-- AUTO FILL --}}
        <input type="text" id="provincia" placeholder="Provincia" readonly>

        <input type="text" id="departamento" placeholder="Departamento" readonly>

        <textarea name="direccion" placeholder="Dirección completa" required></textarea>

        <textarea name="referencia" placeholder="Referencia"></textarea>

        <div class="botones">
            <button type="submit">Registrar Destinatario</button>

            <a href="{{ route('destinatarios.index') }}" class="btn-cancelar">
                Cancelar
            </a>
        </div>

    </form>

</div>

{{-- DATA --}}
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
            document.getElementById('id_distrito').value = d.id_distrito;

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