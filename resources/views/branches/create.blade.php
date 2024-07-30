@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Agregar Sucursal</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Agregar Sucursal</div>
            <div class="card-body">
                <form action="{{ route('branches.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
