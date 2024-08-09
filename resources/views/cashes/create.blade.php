@extends('principal')

@section('contenido')
    <h1>Abrir Caja</h1>
    <form action="{{ route('cashes.store') }}" method="POST">
        @csrf
        <label for="branch_id">Sucursal:</label>
        <select name="branch_id" id="branch_id">
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>

        <label for="initial_amount">Monto Inicial:</label>
        <input type="number" name="initial_amount" id="initial_amount" step="0.01" required>

        <button type="submit">Abrir Caja</button>
    </form>
@endsection
