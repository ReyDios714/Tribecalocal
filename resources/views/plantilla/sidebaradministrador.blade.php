<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('home')}}" onclick="event.preventDefault(); document.getElementById('home-form').submit();"><i class="fa fa-list"></i> Dashboard</a>
                <form id="home-form" action="{{url('home')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-title">
                Menú
            </li>
            <!-- Enlaces para Sucursales -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('branches.index') }}" onclick="event.preventDefault(); document.getElementById('branches-index-form').submit();"><i class="fa fa-building"></i> Sucursales</a>
                <form id="branches-index-form" action="{{ route('branches.index') }}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('branches.create') }}" onclick="event.preventDefault(); document.getElementById('branches-create-form').submit();"><i class="fa fa-plus"></i> Registrar Sucursal</a>
                <form id="branches-create-form" action="{{ route('branches.create') }}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <!-- Enlaces para Inventario -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('inventories.index') }}" onclick="event.preventDefault(); document.getElementById('inventories-index-form').submit();"><i class="fa fa-cubes"></i> Inventario General</a>
                <form id="inventories-index-form" action="{{ route('inventories.index') }}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            @foreach(App\Branch::all() as $branch)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inventories.byBranch', $branch->id) }}" onclick="event.preventDefault(); document.getElementById('inventories-branch-{{ $branch->id }}-form').submit();"><i class="fa fa-cube"></i> Inventario {{ $branch->name }}</a>
                    <form id="inventories-branch-{{ $branch->id }}-form" action="{{ route('inventories.byBranch', $branch->id) }}" method="GET" style="display: none;">
                        {{csrf_field()}}
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inventories.create', $branch->id) }}" onclick="event.preventDefault(); document.getElementById('inventories-create-{{ $branch->id }}-form').submit();"><i class="fa fa-plus"></i> Agregar al Inventario {{ $branch->name }}</a>
                    <form id="inventories-create-{{ $branch->id }}-form" action="{{ route('inventories.create', $branch->id) }}" method="GET" style="display: none;">
                        {{csrf_field()}}
                    </form>
                </li>
            @endforeach
            <li class="nav-item">
                <a class="nav-link" href="{{ route('inventories.transferForm') }}" onclick="event.preventDefault(); document.getElementById('inventories-transfer-form').submit();"><i class="fa fa-exchange"></i> Traspaso de Inventario</a>
                <form id="inventories-transfer-form" action="{{ route('inventories.transferForm') }}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <!-- Otros enlaces -->
        
            <!-- Enlaces para Productos -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}" onclick="event.preventDefault(); document.getElementById('products-index-form').submit();"><i class="icon-basket"></i> Productos</a>
                <form id="products-index-form" action="{{ route('products.index') }}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.create') }}" onclick="event.preventDefault(); document.getElementById('products-create-form').submit();"><i class="icon-basket-loaded"></i> Registrar Producto</a>
                <form id="products-create-form" action="{{ route('products.create') }}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <!-- Enlaces para Categorías -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}" onclick="event.preventDefault(); document.getElementById('categories-index-form').submit();"><i class="fa fa-list"></i> Categorías</a>
                <form id="categories-index-form" action="{{ route('categories.index') }}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.create') }}" onclick="event.preventDefault(); document.getElementById('categories-create-form').submit();"><i class="fa fa-plus"></i> Registrar Categoría</a>
                <form id="categories-create-form" action="{{ route('categories.create') }}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <!-- Enlaces para Insumos -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('insumos.index') }}" onclick="event.preventDefault(); document.getElementById('insumos-index-form').submit();"><i class="fa fa-flask"></i> Insumos</a>
                <form id="insumos-index-form" action="{{ route('insumos.index') }}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('insumos.create') }}" onclick="event.preventDefault(); document.getElementById('insumos-create-form').submit();"><i class="fa fa-plus"></i> Registrar Insumo</a>
                <form id="insumos-create-form" action="{{ route('insumos.create') }}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>

            <!-- Enlaces para Clientes -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clientes.index') }}" onclick="event.preventDefault(); document.getElementById('clientes-index-form').submit();">
                    <i class="fa fa-users"></i> Lista de Clientes
                </a>
                <form id="clientes-index-form" action="{{ route('clientes.index') }}" method="GET" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clientes.create') }}" onclick="event.preventDefault(); document.getElementById('clientes-create-form').submit();">
                    <i class="fa fa-user-plus"></i> Crear Cliente
                </a>
                <form id="clientes-create-form" action="{{ route('clientes.create') }}" method="GET" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            <!-- Otros enlaces -->
             
            <!-- Usuarios -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('user')}}" onclick="event.preventDefault(); document.getElementById('user-form').submit();"><i class="fa fa-user"></i> Usuarios</a>
                <form id="user-form" action="{{url('user')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('rol')}}" onclick="event.preventDefault(); document.getElementById('rol-form').submit();"><i class="fa fa-list"></i> Roles</a>
                <form id="rol-form" action="{{url('rol')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-title">
                Menú Empleados
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('employees')}}" onclick="event.preventDefault(); document.getElementById('employees-index-form').submit();"><i class="icon-people"></i> Empleados</a>
                <form id="employees-index-form" action="{{url('employees')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('employees/create')}}" onclick="event.preventDefault(); document.getElementById('employees-create-form').submit();"><i class="icon-user-follow"></i> Registrar Empleado</a>
                <form id="employees-create-form" action="{{url('employees/create')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
