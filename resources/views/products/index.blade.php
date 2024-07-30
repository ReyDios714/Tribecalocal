@extends('principal')

@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Lista de Productos</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Lista de Productos</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Código de Barras</th>
                            <th>Costo de Compra</th>
                            <th>Costo de Venta</th>
                            <th>Costo por ML/GR</th>
                            <th>Descripción</th>
                            <th>Costo</th>
                            <th>Precio de Venta</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->type }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->quantity_ml_grs }}</td>
                                <td>{{ $product->barcode }}</td>
                                <td>{{ $product->purchase_cost }}</td>
                                <td>{{ $product->sale_cost }}</td>
                                <td>{{ $product->cost_per_ml_gr }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->cost }}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
