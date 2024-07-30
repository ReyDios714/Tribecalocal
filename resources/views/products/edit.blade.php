@extends('principal')

@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Editar Producto</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Editar Producto</div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="type">Tipo de Producto:</label>
                        <select name="type" id="type" class="form-control">
                            <option value="reventa" {{ $product->type == 'reventa' ? 'selected' : '' }}>Producto Reventa</option>
                            <option value="cabina" {{ $product->type == 'cabina' ? 'selected' : '' }}>Producto Cabina</option>
                            <option value="gasto" {{ $product->type == 'gasto' ? 'selected' : '' }}>Producto Gasto</option>
                            <option value="servicio" {{ $product->type == 'servicio' ? 'selected' : '' }}>Servicio</option>
                            <option value="servicio_gasto" {{ $product->type == 'servicio_gasto' ? 'selected' : '' }}>Servicio Gasto</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="brand">Marca:</label>
                        <input type="text" name="brand" id="brand" class="form-control" value="{{ $product->brand }}">
                    </div>
                    <div class="form-group">
                        <label for="quantity_ml_grs">Cantidad (ML/GR):</label>
                        <input type="number" name="quantity_ml_grs" id="quantity_ml_grs" class="form-control" value="{{ $product->quantity_ml_grs }}">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Código de Barras:</label>
                        <input type="text" name="barcode" id="barcode" class="form-control" value="{{ $product->barcode }}">
                    </div>
                    <div class="form-group">
                        <label for="purchase_cost">Costo de Compra:</label>
                        <input type="number" name="purchase_cost" id="purchase_cost" class="form-control" step="0.01" value="{{ $product->purchase_cost }}">
                    </div>
                    <div class="form-group">
                        <label for="sale_cost">Costo de Venta:</label>
                        <input type="number" name="sale_cost" id="sale_cost" class="form-control" step="0.01" value="{{ $product->sale_cost }}">
                    </div>
                    <div class="form-group">
                        <label for="cost_per_ml_gr">Costo por ML/GR:</label>
                        <input type="number" name="cost_per_ml_gr" id="cost_per_ml_gr" class="form-control" step="0.01" value="{{ $product->cost_per_ml_gr }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cost">Costo:</label>
                        <input type="number" name="cost" id="cost" class="form-control" step="0.01" value="{{ $product->cost }}">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Precio de Venta:</label>
                        <input type="number" name="sale_price" id="sale_price" class="form-control" step="0.01" value="{{ $product->sale_price }}">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoría:</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="insumos">Insumos:</label>
                        <textarea name="insumos[]" id="insumos" class="form-control">{{ implode("\n", $product->insumos->pluck('description')->toArray()) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
