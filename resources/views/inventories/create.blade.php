@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Agregar Producto al Inventario - Sucursal {{ $branch->name }}</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Agregar Producto al Inventario</div>
            <div class="card-body">
                <form action="{{ route('inventories.store', $branch->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="product_id">Producto:</label>
                        <select name="product_id" id="product_id" class="form-control" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Cantidad:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar al Inventario</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
