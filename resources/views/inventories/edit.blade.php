@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Editar Inventario</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Editar Inventario</div>
            <div class="card-body">
                <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="quantity">Cantidad:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $inventory->quantity }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

