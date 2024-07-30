@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Editar Insumo</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Editar Insumo</div>
            <div class="card-body">
                <form action="{{ route('insumos.update', $insumo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{ $insumo->description }}" required>
                    </div>
                    <div class="form-group">
                        <label for="product_id">Producto:</label>
                        <select name="product_id" id="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $insumo->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
