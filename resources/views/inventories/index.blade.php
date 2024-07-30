@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Inventario</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Inventario</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Sucursal</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventories as $inventory)
                            <tr>
                                <td>{{ $inventory->product->name }}</td>
                                <td>{{ $inventory->branch->name }}</td>
                                <td>{{ $inventory->quantity }}</td>
                                <td>
                                    <a href="{{ route('inventories.edit', $inventory->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="{{ route('inventories.show', $inventory->product_id) }}" class="btn btn-info btn-sm">Ver Producto</a>
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

