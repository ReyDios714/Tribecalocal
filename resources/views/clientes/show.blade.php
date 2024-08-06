@extends('principal')

@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Detalles del Cliente</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Detalles del Cliente</div>
            <div class="card-body">
                <p><strong>Nombre Completo:</strong> {{ $cliente->nombre_completo }}</p>
                <p><strong>Celular:</strong> {{ $cliente->celular }}</p>
                <p><strong>Cumpleaños:</strong> {{ $cliente->cumpleaños }}</p>
                <p><strong>Email:</strong> {{ $cliente->email }}</p>
                <p><strong>Código Postal:</strong> {{ $cliente->codigo_postal }}</p>
                <p><strong>Cómo se enteró:</strong> {{ $cliente->como_se_entero }}</p>
                <a href="{{ route('clientes.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
</main>
@endsection

