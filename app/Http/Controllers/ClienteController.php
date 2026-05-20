<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd("ENTRO AL INDEX");
        $clientes = Cliente::all();
        //  dd($clientes);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('clientes.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'razon_social' => 'required',
        'ruc' => 'required',
        ]);

        Cliente::create([
            'razon_social' => $request->razon_social,
            'ruc' => $request->ruc,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion_fiscal' => $request->direccion_fiscal,
            'estado' => $request->estado,
        ]);

        return redirect()->route('clientes.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
