@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Lista de Clientes</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Lista de Clientes</div>
            <div class="card-body">
                <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Crear Cliente</a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Celular</th>
                        <th>Cumpleaños</th>
                        <th>Email</th>
                        <th>Código Postal</th>
                        <th>Cómo se enteró</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nombre_completo }}</td>
                        <td>{{ $cliente->celular }}</td>
                        <td>{{ $cliente->cumpleaños }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->codigo_postal }}</td>
                        <td>{{ $cliente->como_se_entero }}</td>
                        <td>
                            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info">Mostrar</a>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</main>
@endsection


