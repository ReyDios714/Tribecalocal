@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Sucursales</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Sucursales</div>
            <div class="card-body">
                <a href="{{ route('branches.create') }}" class="btn btn-primary mb-3">Agregar Sucursal</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $branch)
                            <tr>
                                <td>{{ $branch->id }}</td>
                                <td>{{ $branch->name }}</td>
                                <td>
                                    <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline-block;">
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
