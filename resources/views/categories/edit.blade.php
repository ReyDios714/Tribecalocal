@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Editar Categoría</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Editar Categoría</div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
