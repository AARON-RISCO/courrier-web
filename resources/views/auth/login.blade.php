<!DOCTYPE html>
<html lang="es">
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Login - FastDeliveries</title> 
        @vite(['resources/css/login.css', 'resources/js/app.js']) 
    </head> 
    <body> 
        <div class="login-container"> 
            <div class="login-card"> 
                <img src="{{ asset('img/logo.png') }}" class="logo"> 
                <h2>INICIAR SESIÓN</h2> <!-- ERRORES --> 
                @if ($errors->any()) 
                <div style=" background: #ffdede; color: red; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; "> 
                    {{ $errors->first() }} 
                </div> 
                @endif
                <x-auth-session-status class="mb-4" :status="session('status')" /> 
                <form method="POST" action="{{ route('login') }}"> @csrf <!-- CORREO --> 
                    <input type="email" name="email" placeholder="Ingrese Correo Electrónico" required > <!-- PASSWORD --> 
                    <input type="password" name="password" placeholder="Ingrese Contraseña" required > <!-- BOTON --> 
                    <button type="submit"> INGRESAR </button> 
                </form> 
                    <div class="footer"> FastDeliveries © {{ date('Y') }} </div> 
            </div> 
        </div> 
    </body> 
</html>