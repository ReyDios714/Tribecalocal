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
            <li class="nav-item">
                <a class="nav-link" href="{{url('categoria')}}" onclick="event.preventDefault(); document.getElementById('categoria-form').submit();"><i class="fa fa-list"></i> Categorías</a>
                <form id="categoria-form" action="{{url('categoria')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('producto')}}" onclick="event.preventDefault(); document.getElementById('producto-form').submit();"><i class="fa fa-list"></i> Productos</a>
                <form id="producto-form" action="{{url('producto')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('compra')}}" onclick="event.preventDefault(); document.getElementById('compra-form').submit();"><i class="fa fa-shopping-cart"></i> Compras</a>
                <form id="compra-form" action="{{url('compra')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('proveedor')}}" onclick="event.preventDefault(); document.getElementById('proveedor-form').submit();"><i class="fa fa-users"></i> Proveedores</a>
                <form id="proveedor-form" action="{{url('proveedor')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('venta')}}" onclick="event.preventDefault(); document.getElementById('venta-form').submit();"><i class="fa fa-suitcase"></i> Ventas</a>
                <form id="venta-form" action="{{url('venta')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('cliente')}}" onclick="event.preventDefault(); document.getElementById('cliente-form').submit();"><i class="fa fa-users"></i> Clientes</a>
                <form id="cliente-form" action="{{url('cliente')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
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
            <li class="nav-title">Menú Productos</li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('products')}}" onclick="event.preventDefault(); document.getElementById('products-index-form').submit();"><i class="icon-basket"></i> Productos</a>
                <form id="products-index-form" action="{{url('products')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('products/create')}}" onclick="event.preventDefault(); document.getElementById('products-create-form').submit();"><i class="icon-basket-loaded"></i> Registrar Producto</a>
                <form id="products-create-form" action="{{url('products/create')}}" method="GET" style="display: none;">
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
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
