@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Crear Insumo</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Crear Insumo</div>
            <div class="card-body">
                <form action="{{ route('insumos.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <input type="text" name="description" id="description" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="product_id">Producto:</label>
                        <select name="product_id" id="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
