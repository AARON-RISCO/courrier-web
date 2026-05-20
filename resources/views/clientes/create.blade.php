@extends('layouts.app')

@section('contenido')
<div class="card">
    <h1>Nuevo Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST">

        @csrf
        <input type="text" name="ruc" placeholder="RUC" required>

        <input type="text" name="razon_social" placeholder="RAZON SOCIAL" required>

        <input type="text" name="telefono" placeholder="TELEFONO" required>
    
        <input type="email" name="correo" placeholder="CORREO" required>

        <input type="text" name="direccion_fiscal" placeholder="DIRECCION FISCAL">

        <select name="estado" aria-placeholder="estado" required>
            <option value="">
                SELECCIONA ESTADO
            </option>
            <option value="ACTIVO">
                ACTIVO
            </option>

            <option value="INACTIVO">
                INACTIVO
            </option>
        </select>

        <br><br>
        <div class="botones">
            <button type="submit">
            Guardar Cliente
            </button>
              
            <a href="{{ route('clientes.index') }}" class="btn-cancelar">
                Cancelar
            </a>
        </div>
       
    </form>
</div>
@endsection
