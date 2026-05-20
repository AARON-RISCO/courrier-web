<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteDestinatario;
use App\Models\Distrito;

class ClienteDestinatarioController extends Controller
{
    public function index()
    {
        $destinatarios = ClienteDestinatario::all();

        return view('destinatarios.index', compact('destinatarios'));
    }

    public function create()
    {
        $distritos = Distrito::with('provincia.departamento')->get();

        return view('destinatarios.create', compact('distritos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'id_distrito' => 'required|exists:distritos,id_distrito',
        ]);

        ClienteDestinatario::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'referencia' => $request->referencia,
            'id_distrito' => $request->id_distrito,
        ]);

        return redirect()->route('destinatarios.index')
            ->with('success', 'DESTINATARIO REGISTRADO');
    }

    public function edit($id)
    {
        $destinatario = ClienteDestinatario::findOrFail($id);

        $distritos = Distrito::with('provincia.departamento')->get();

        return view('destinatarios.edit', compact('destinatario', 'distritos'));
    }

    public function update(Request $request, $id)
    {
        $destinatario = ClienteDestinatario::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'id_distrito' => 'required|exists:distritos,id_distrito',
        ]);

        $destinatario->update([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'referencia' => $request->referencia,
            'id_distrito' => $request->id_distrito,
        ]);

        return redirect()->route('destinatarios.index')
            ->with('success', 'DESTINATARIO ACTUALIZADO');
    }

    public function destroy($id)
    {
        ClienteDestinatario::findOrFail($id)->delete();

        return redirect()->route('destinatarios.index')
            ->with('success', 'DESTINATARIO ELIMINADO');
    }
}