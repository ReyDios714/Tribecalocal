@extends('principal')

@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Registrar Producto</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Registrar Producto</div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="type">Tipo de Producto:</label>
                        <select name="type" id="type" class="form-control">
                            <option value="reventa">Producto Reventa</option>
                            <option value="cabina">Producto Cabina</option>
                            <option value="gasto">Producto Gasto</option>
                            <option value="servicio">Servicio</option>
                            <option value="servicio_gasto">Servicio Gasto</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="brand">Marca:</label>
                        <input type="text" name="brand" id="brand" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantity_ml_grs">Cantidad (ML/GR):</label>
                        <input type="number" name="quantity_ml_grs" id="quantity_ml_grs" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Código de Barras:</label>
                        <input type="text" name="barcode" id="barcode" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="purchase_cost">Costo de Compra:</label>
                        <input type="number" name="purchase_cost" id="purchase_cost" class="form-control" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="sale_cost">Costo de Venta:</label>
                        <input type="number" name="sale_cost" id="sale_cost" class="form-control" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="cost_per_ml_gr">Costo por ML/GR:</label>
                        <input type="number" name="cost_per_ml_gr" id="cost_per_ml_gr" class="form-control" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cost">Costo:</label>
                        <input type="number" name="cost" id="cost" class="form-control" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Precio de Venta:</label>
                        <input type="number" name="sale_price" id="sale_price" class="form-control" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoría:</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="insumos">Insumos:</label>
                        <textarea name="insumos[]" id="insumos" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
