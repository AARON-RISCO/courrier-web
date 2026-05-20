<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteDestinatario;

class ClienteDestinatarioController extends Controller
{
    public function index()
    {
        $destinatarios = ClienteDestinatario::all();

        return view('destinatarios.index', compact('destinatarios'));
    }

    public function create()
    {
        return view('destinatarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        ClienteDestinatario::create($request->all());

        return redirect()->route('destinatarios.index')
            ->with('success', 'DESTINATARIO REGISTRADO');
    }

    public function edit($id)
    {
        $destinatario = ClienteDestinatario::findOrFail($id);

        return view('destinatarios.edit', compact('destinatario'));
    }

    public function update(Request $request, $id)
    {
        $destinatario = ClienteDestinatario::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        $destinatario->update($request->all());

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