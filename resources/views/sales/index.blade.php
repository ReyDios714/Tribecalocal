@extends('principal')

@section('contenido')
    <h1>Lista de Ventas</h1>
    <a href="{{ route('sales.create') }}">Crear Venta</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Cliente</th>
                <th>Sucursal</th>
                <th>Tipo de Pago</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->total }}</td>
                    <td>{{ $sale->client->nombre_completo ?? 'N/A' }}</td>
                    <td>{{ $sale->branch->name }}</td>
                    <td>{{ $sale->payment_type }}</td>
                    <td>
                        <!-- Acciones para cada venta -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

