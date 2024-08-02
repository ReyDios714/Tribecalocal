<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'quantity_ml_grs' => 'nullable|integer',
            'barcode' => 'nullable|string|max:255',
            'purchase_cost' => 'nullable|numeric',
            'sale_cost' => 'nullable|numeric',
            'cost_per_ml_gr' => 'nullable|numeric',
            'description' => 'nullable|string',
            'cost' => 'nullable|numeric',
            'sale_price' => 'nullable|numeric',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        Product::create($request->only([
            'type', 
            'name', 
            'brand', 
            'quantity_ml_grs', 
            'barcode', 
            'purchase_cost', 
            'sale_cost', 
            'cost_per_ml_gr', 
            'description', 
            'cost', 
            'sale_price', 
            'category_id'
        ]));

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'quantity_ml_grs' => 'nullable|integer',
            'barcode' => 'nullable|string|max:255',
            'purchase_cost' => 'nullable|numeric',
            'sale_cost' => 'nullable|numeric',
            'cost_per_ml_gr' => 'nullable|numeric',
            'description' => 'nullable|string',
            'cost' => 'nullable|numeric',
            'sale_price' => 'nullable|numeric',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only([
            'type', 
            'name', 
            'brand', 
            'quantity_ml_grs', 
            'barcode', 
            'purchase_cost', 
            'sale_cost', 
            'cost_per_ml_gr', 
            'description', 
            'cost', 
            'sale_price', 
            'category_id'
        ]));

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }

    // Método para mostrar un producto específico junto con sus inventarios
    public function show($id)
    {
        $product = Product::with('inventories.branch')->findOrFail($id);
        return view('products.show', compact('product'));
    }
}
