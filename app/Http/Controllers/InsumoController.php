<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insumo;
use App\Product;

class InsumoController extends Controller
{
    public function index()
    {
        $insumos = Insumo::with('product')->get();
        return view('insumos.index', compact('insumos'));
    }

    public function create()
    {
        $products = Product::all(); // Recupera todos los productos
        return view('insumos.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        Insumo::create($request->only('description', 'product_id'));

        return redirect()->route('insumos.index')->with('success', 'Insumo creado exitosamente.');
    }

    public function edit($id)
    {
        $insumo = Insumo::findOrFail($id);
        $products = Product::all();
        return view('insumos.edit', compact('insumo', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        $insumo = Insumo::findOrFail($id);
        $insumo->update($request->only('description', 'product_id'));

        return redirect()->route('insumos.index')->with('success', 'Insumo actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect()->route('insumos.index')->with('success', 'Insumo eliminado exitosamente.');
    }
}

