@extends('principal')

@section('contenido')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <h2>Inventarios</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Sucursal</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product->inventories as $inventory)
                <tr>
                    <td>{{ $inventory->branch->name }}</td>
                    <td>{{ $inventory->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
