@extends('layouts.app')

@section('contenido')
<div class="card">
    <h1>Nuevo Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST">

        @csrf

        <label>Razón Social</label>
        <input type="text" name="razon_social">

        <br><br>

        <label>RUC</label>
        <input type="text" name="ruc">

        <br><br>

        <label>Teléfono</label>
        <input type="text" name="telefono">

        <br><br>

        <label>Correo</label>
        <input type="email" name="correo">

        <br><br>

        <label>Dirección Fiscal</label>
        <input type="text" name="direccion_fiscal">

        <br><br>

        <label>Estado</label>

        <select name="estado">
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
