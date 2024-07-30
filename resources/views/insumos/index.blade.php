@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Insumos</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Lista de Insumos</div>
            <div class="card-body">
                <a href="{{ route('insumos.create') }}" class="btn btn-primary mb-3">Crear Insumo</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Producto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($insumos as $insumo)
                            <tr>
                                <td>{{ $insumo->id }}</td>
                                <td>{{ $insumo->description }}</td>
                                <td>{{ $insumo->product->name }}</td>
                                <td>
                                    <a href="{{ route('insumos.edit', $insumo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('insumos.destroy', $insumo->id) }}" method="POST" style="display:inline-block;">
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
