<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

 public function index()
{
    $usuarios = User::with('rol')->get();

    return view('usuarios.index', compact('usuarios'));
}

    public function create()
    {
        $roles = Rol::all();

        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:usuarios,correo',
            'contrasena' => 'required',
            'id_rol' => 'required'
        ]);

        User::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->contrasena),
            'id_rol' => $request->id_rol
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'USUARIO REGISTRADO');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        $roles = Rol::all();

        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:usuarios,correo,'.$id.',id_usuario',
            'id_rol' => 'required'
        ]);

        $datos = [
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'id_rol' => $request->id_rol
        ];

        if($request->contrasena != ''){
            $datos['contrasena'] = Hash::make($request->contrasena);
        }

        $usuario->update($datos);

        return redirect()->route('usuarios.index')
            ->with('success', 'USUARIO ACTUALIZADO');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'USUARIO ELIMINADO');
    }
}
