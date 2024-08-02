@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Traspaso de Inventario</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Traspaso de Inventario</div>
            <div class="card-body">
                <form action="{{ route('inventories.transfer') }}" method="POST">
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
                        <label for="from_branch_id">De Sucursal:</label>
                        <select name="from_branch_id" id="from_branch_id" class="form-control" required>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="to_branch_id">A Sucursal:</label>
                        <select name="to_branch_id" id="to_branch_id" class="form-control" required>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Cantidad:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Realizar Traspaso</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection




