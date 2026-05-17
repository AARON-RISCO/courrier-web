@extends('layouts.app')

@section('contenido')

@vite([
    'resources/css/dashboard.css',
    ])
    
<div class="bienvenida">

    <h1>Panel Administrativo</h1>

    <p>
        Bienvenido al sistema FastDeliveries.
        Desde aquí podrás administrar paquetes,
        clientes, repartidores y reportes.
    </p>

</div>

<div class="cards">

    <div class="card">
        <h3>Total Envíos</h3>
        <p>125</p>
    </div>

    <div class="card">
        <h3>Clientes</h3>
        <p>58</p>
    </div>

    <div class="card">
        <h3>Repartidores</h3>
        <p>12</p>
    </div>

    <div class="card">
        <h3>Entregas Hoy</h3>
        <p>34</p>
    </div>

</div>

@endsection