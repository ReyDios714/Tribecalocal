<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Product;
use App\Branch;
use App\InventoryMovement;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with('product', 'branch')->get();
        return view('inventories.index', compact('inventories'));
    }

    public function byBranch($branch_id)
    {
        $branch = Branch::findOrFail($branch_id);
        $inventories = Inventory::with('product')->where('branch_id', $branch_id)->get();
        return view('inventories.byBranch', compact('inventories', 'branch'));
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventories.edit', compact('inventory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->only('quantity'));

        return redirect()->route('inventories.index')->with('success', 'Inventario actualizado exitosamente.');
    }

    public function show($id)
    {
        $product = Product::with('inventories.branch')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function transferForm()
    {
        $products = Product::all();
        $branches = Branch::all();
        return view('inventories.transfer', compact('products', 'branches'));
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'from_branch_id' => 'required|exists:branches,id',
            'to_branch_id' => 'required|exists:branches,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $fromInventory = Inventory::where('product_id', $request->product_id)
            ->where('branch_id', $request->from_branch_id)
            ->firstOrFail();
        
        $toInventory = Inventory::firstOrCreate([
            'product_id' => $request->product_id,
            'branch_id' => $request->to_branch_id,
        ]);

        $fromInventory->quantity -= $request->quantity;
        $fromInventory->save();

        $toInventory->quantity += $request->quantity;
        $toInventory->save();

        InventoryMovement::create([
            'product_id' => $request->product_id,
            'from_branch_id' => $request->from_branch_id,
            'to_branch_id' => $request->to_branch_id,
            'type' => 'transfer',
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('inventories.index')->with('success', 'Traspaso realizado exitosamente.');
    }
}
