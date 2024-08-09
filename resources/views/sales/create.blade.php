@extends('principal')

@section('contenido')
    <h1>Crear Venta</h1>
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <label for="cash_id">Caja:</label>
        <select name="cash_id" id="cash_id" required>
            @foreach($cashes as $cash)
                <option value="{{ $cash->id }}">{{ $cash->id }} - {{ $cash->branch->name }}</option>
            @endforeach
        </select>

        <label for="client_id">Cliente:</label>
        <select name="client_id" id="client_id">
            <option value="">Seleccionar Cliente</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nombre_completo }}</option>
            @endforeach
        </select>

        <label for="branch_id">Sucursal:</label>
        <select name="branch_id" id="branch_id" required>
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>

        <label for="total">Total:</label>
        <input type="number" name="total" id="total" step="0.01" required>

        <label for="payment_type">Tipo de Pago:</label>
        <input type="text" name="payment_type" id="payment_type" required>

        <label for="discount">Descuento:</label>
        <input type="number" name="discount" id="discount" step="0.01">

        <label for="commission">Comisión:</label>
        <input type="number" name="commission" id="commission" step="0.01">

        <button type="submit">Crear Venta</button>
    </form>
@endsection

