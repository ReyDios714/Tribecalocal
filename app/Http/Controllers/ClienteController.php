<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.form', ['action' => route('clientes.store'), 'method' => 'POST']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'celular' => 'required',
            'cumpleaños' => 'required|date',
            'email' => 'required|email|unique:clientes',
            'codigo_postal' => 'required',
            'como_se_entero' => 'required',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.form', [
            'cliente' => $cliente,
            'action' => route('clientes.update', $cliente),
            'method' => 'PUT'
        ]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'celular' => 'required',
            'cumpleaños' => 'required|date',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'codigo_postal' => 'required',
            'como_se_entero' => 'required',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}

