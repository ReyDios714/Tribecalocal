<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function () {
     
    Route::get('/','Auth\LoginController@showLoginForm');
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

      

        Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('/insumos', [InsumoController::class, 'index'])->name('insumos.index');
        Route::get('/insumos/create', [InsumoController::class, 'create'])->name('insumos.create');
        Route::post('/insumos', [InsumoController::class, 'store'])->name('insumos.store');
        Route::get('/insumos/{insumo}/edit', [InsumoController::class, 'edit'])->name('insumos.edit');
        Route::put('/insumos/{insumo}', [InsumoController::class, 'update'])->name('insumos.update');
        Route::delete('/insumos/{insumo}', [InsumoController::class, 'destroy'])->name('insumos.destroy');



    
    });


});



