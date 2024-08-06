<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ClienteController;

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/home', 'HomeController@index');

    Route::group(['middleware' => ['Comprador']], function () {
        Route::resource('categoria', 'CategoriaController');
        Route::resource('producto', 'ProductoController');
        Route::get('/listarProductoPdf', 'ProductoController@listarPdf')->name('productos_pdf');
        Route::resource('proveedor', 'ProveedorController');
        Route::resource('compra', 'CompraController');
        Route::get('/pdfCompra/{id}', 'CompraController@pdf')->name('compra_pdf');
    });

    Route::group(['middleware' => ['Vendedor']], function () {
        Route::resource('categoria', 'CategoriaController');
        Route::resource('producto', 'ProductoController');
        Route::get('/listarProductoPdf', 'ProductoController@listarPdf')->name('productos_pdf');
        Route::resource('cliente', 'ClienteController');
        Route::resource('venta', 'VentaController');
        Route::get('/pdfVenta/{id}', 'VentaController@pdf')->name('venta_pdf');
    });

    Route::group(['middleware' => ['Administrador']], function () {
        Route::resource('categoria', 'CategoriaController');
        Route::resource('producto', 'ProductoController');
        Route::get('/listarProductoPdf', 'ProductoController@listarPdf')->name('productos_pdf');
        Route::resource('proveedor', 'ProveedorController');
        Route::resource('compra', 'CompraController');
        Route::get('/pdfCompra/{id}', 'CompraController@pdf')->name('compra_pdf');
        Route::resource('venta', 'VentaController');
        Route::get('/pdfVenta/{id}', 'VentaController@pdf')->name('venta_pdf');
        Route::resource('cliente', 'ClienteController');
        Route::resource('rol', 'RolController');
        Route::resource('user', 'UserController');

        // Rutas para Empleados
        Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

        // Rutas para Productos
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        // Rutas para Categorías
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Rutas para Insumos
        Route::get('/insumos', [InsumoController::class, 'index'])->name('insumos.index');
        Route::get('/insumos/create', [InsumoController::class, 'create'])->name('insumos.create');
        Route::post('/insumos', [InsumoController::class, 'store'])->name('insumos.store');
        Route::get('/insumos/{insumo}/edit', [InsumoController::class, 'edit'])->name('insumos.edit');
        Route::put('/insumos/{insumo}', [InsumoController::class, 'update'])->name('insumos.update');
        Route::delete('/insumos/{insumo}', [InsumoController::class, 'destroy'])->name('insumos.destroy');

        // Rutas para Inventario
        Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories.index');
        Route::get('/inventories/branch/{branch_id}', [InventoryController::class, 'byBranch'])->name('inventories.byBranch');
        Route::get('/inventories/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventories.edit');
        Route::put('/inventories/{inventory}', [InventoryController::class, 'update'])->name('inventories.update');
        Route::get('/inventories/{product}', [InventoryController::class, 'show'])->name('inventories.show');

        // Rutas para agregar registros al inventario
        Route::get('/inventories/branch/{branch_id}/create', [InventoryController::class, 'create'])->name('inventories.create');
        Route::post('/inventories/branch/{branch_id}', [InventoryController::class, 'store'])->name('inventories.store');

        // Rutas para Traspasos
        Route::get('/inventories/transfer', [InventoryController::class, 'transferForm'])->name('inventories.transferForm');
        Route::post('/inventories/transfer', [InventoryController::class, 'transfer'])->name('inventories.transfer');

        // Rutas para Sucursales
        Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
        Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create');
        Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
        Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');
        Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');
        Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');

        

        Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
        Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
        Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
        Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
        Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
        Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
        Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    });
});


