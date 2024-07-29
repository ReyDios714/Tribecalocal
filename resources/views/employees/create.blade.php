@extends('principal')

@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">Sistema Tribeca</a></li>
        <li class="breadcrumb-item active">Registrar Empleado</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Registrar Empleado</div>
            <div class="card-body">
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="user_id">Usuario:</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección:</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Celular:</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="rfc">RFC:</label>
                        <input type="text" name="rfc" id="rfc" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="curp">CURP:</label>
                        <input type="text" name="curp" id="curp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Cumpleaños:</label>
                        <input type="date" name="birthday" id="birthday" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_type">Tipo de Empleado:</label>
                        <select name="employee_type" id="employee_type" class="form-control">
                            <option value="planta">Planta</option>
                            <option value="temporal">Temporal</option>
                            <option value="comision">Comisión</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Puesto:</label>
                        <select name="position" id="position" class="form-control">
                            <option value="administrativo">Administrativo</option>
                            <option value="auxiliar">Auxiliar</option>
                            <option value="estilista">Estilista</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_of_joining">Fecha de Ingreso:</label>
                        <input type="date" name="date_of_joining" id="date_of_joining" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="monthly_salary">Sueldo Mensual:</label>
                        <input type="number" name="monthly_salary" id="monthly_salary" class="form-control" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="service_commission">Comisión por Servicio:</label>
                        <input type="number" name="service_commission" id="service_commission" class="form-control" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="product_commission">Comisión por Producto:</label>
                        <input type="number" name="product_commission" id="product_commission" class="form-control" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="attachments">Adjuntar Archivos:</label>
                        <input type="file" name="attachments[]" id="attachments" class="form-control-file" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

