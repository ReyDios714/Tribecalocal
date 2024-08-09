@extends('principal')

@section('contenido')
    <h1>Lista de Cajas</h1>
    <a href="{{ route('cashes.create') }}">Abrir Caja</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Sucursal</th>
                <th>Monto Inicial</th>
                <th>Usuario</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cashes as $cash)
                <tr>
                    <td>{{ $cash->id }}</td>
                    <td>{{ $cash->branch->name }}</td>
                    <td>{{ $cash->initial_amount }}</td>
                    <td>{{ $cash->user->name }}</td>
                    <td>{{ $cash->status }}</td>
                    <td>
                        @if($cash->status == 'open')
                            <form action="{{ route('cashes.close', $cash->id) }}" method="POST">
                                @csrf
                                <button type="submit">Cerrar Caja</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

