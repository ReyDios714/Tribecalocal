@extends('principal')

@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Lista de Empleados</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Lista de Empleados</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Celular</th>
                            <th>RFC</th>
                            <th>CURP</th>
                            <th>Cumpleaños</th>
                            <th>Tipo de Empleado</th>
                            <th>Puesto</th>
                            <th>Fecha de Ingreso</th>
                            <th>Sueldo Mensual</th>
                            <th>Comisión por Servicio</th>
                            <th>Comisión por Producto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->user->nombre }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->rfc }}</td>
                                <td>{{ $employee->curp }}</td>
                                <td>{{ $employee->birthday }}</td>
                                <td>{{ $employee->employee_type }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->date_of_joining }}</td>
                                <td>{{ $employee->monthly_salary }}</td>
                                <td>{{ $employee->service_commission }}</td>
                                <td>{{ $employee->product_commission }}</td>
                                <td>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
