@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">{{ isset($cliente) ? 'Editar Cliente' : 'Crear Cliente' }}</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ isset($cliente) ? 'Editar Cliente' : 'Crear Cliente' }}</div>
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @if(isset($cliente))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="nombre_completo">Nombre Completo:</label>
                        <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" value="{{ old('nombre_completo', $cliente->nombre_completo ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" name="celular" id="celular" class="form-control" value="{{ old('celular', $cliente->celular ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="cumpleaños">Cumpleaños:</label>
                        <input type="date" name="cumpleaños" id="cumpleaños" class="form-control" value="{{ old('cumpleaños', $cliente->cumpleaños ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $cliente->email ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="codigo_postal">Código Postal:</label>
                        <input type="text" name="codigo_postal" id="codigo_postal" class="form-control" value="{{ old('codigo_postal', $cliente->codigo_postal ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="como_se_entero">Cómo se enteró:</label>
                        <input type="text" name="como_se_entero" id="como_se_entero" class="form-control" value="{{ old('como_se_entero', $cliente->como_se_entero ?? '') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($cliente) ? 'Actualizar' : 'Crear' }}</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

