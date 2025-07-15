<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/ping', function () {
    return response()->json(['message' => 'API funcionando']);
});


use App\Http\Controllers\RolController;
use App\Http\Controllers\TipoSitioController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\CentroFormacionController;
use App\Http\Controllers\OpcionController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\TituladoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\FichaFormacionController;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\DetalleSolicitudController;
use App\Http\Controllers\EntregaMaterialController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\AuthController;

Route::get('/roles', [RolController::class, 'index']);
Route::get('/roles/{id}', [RolController::class, 'show']);
Route::post('/roles', [RolController::class, 'store']);
Route::put('/roles/{id}', [RolController::class, 'update']);
Route::delete('/roles/{id}', [RolController::class, 'destroy']);


Route::get('/tipo-sitio', [TipoSitioController::class, 'index']);
Route::get('/tipo-sitio/{id}', [TipoSitioController::class, 'show']);
Route::post('/tipo-sitio', [TipoSitioController::class, 'store']);
Route::put('/tipo-sitio/{id}', [TipoSitioController::class, 'update']);
Route::delete('/tipo-sitio/{id}', [TipoSitioController::class, 'destroy']);


Route::get('/categorias-productos', [CategoriaProductoController::class, 'index']);
Route::get('/categorias-productos/{id}', [CategoriaProductoController::class, 'show']);
Route::post('/categorias-productos', [CategoriaProductoController::class, 'store']);
Route::put('/categorias-productos/{id}', [CategoriaProductoController::class, 'update']);
Route::delete('/categorias-productos/{id}', [CategoriaProductoController::class, 'destroy']);


Route::get('/municipios', [MunicipioController::class, 'index']);
Route::get('/municipios/{id}', [MunicipioController::class, 'show']);
Route::post('/municipios', [MunicipioController::class, 'store']);
Route::put('/municipios/{id}', [MunicipioController::class, 'update']);
Route::delete('/municipios/{id}', [MunicipioController::class, 'destroy']);


Route::get('/centros-formacion', [CentroFormacionController::class, 'index']);
Route::get('/centros-formacion/{id}', [CentroFormacionController::class, 'show']);
Route::post('/centros-formacion', [CentroFormacionController::class, 'store']);
Route::put('/centros-formacion/{id}', [CentroFormacionController::class, 'update']);
Route::delete('/centros-formacion/{id}', [CentroFormacionController::class, 'destroy']);


Route::get('/opciones', [OpcionController::class, 'index']);
Route::get('/opciones/{id}', [OpcionController::class, 'show']);
Route::post('/opciones', [OpcionController::class, 'store']);
Route::put('/opciones/{id}', [OpcionController::class, 'update']);
Route::delete('/opciones/{id}', [OpcionController::class, 'destroy']);


Route::get('/modulos', [ModuloController::class, 'index']);
Route::get('/modulos/{id}', [ModuloController::class, 'show']);
Route::post('/modulos', [ModuloController::class, 'store']);
Route::put('/modulos/{id}', [ModuloController::class, 'update']);
Route::delete('/modulos/{id}', [ModuloController::class, 'destroy']);


Route::get('/sedes', [SedeController::class, 'index']);
Route::get('/sedes/{id}', [SedeController::class, 'show']);
Route::post('/sedes', [SedeController::class, 'store']);
Route::put('/sedes/{id}', [SedeController::class, 'update']);
Route::delete('/sedes/{id}', [SedeController::class, 'destroy']);


Route::get('/titulados', [TituladoController::class, 'index']);
Route::get('/titulados/{id}', [TituladoController::class, 'show']);
Route::post('/titulados', [TituladoController::class, 'store']);
Route::put('/titulados/{id}', [TituladoController::class, 'update']);
Route::delete('/titulados/{id}', [TituladoController::class, 'destroy']);


Route::get('/areas', [AreaController::class, 'index']);
Route::get('/areas/{id}', [AreaController::class, 'show']);
Route::post('/areas', [AreaController::class, 'store']);
Route::put('/areas/{id}', [AreaController::class, 'update']);
Route::delete('/areas/{id}', [AreaController::class, 'destroy']);


Route::get('/fichas-formacion', [FichaFormacionController::class, 'index']);
Route::get('/fichas-formacion/{id}', [FichaFormacionController::class, 'show']);
Route::post('/fichas-formacion', [FichaFormacionController::class, 'store']);
Route::put('/fichas-formacion/{id}', [FichaFormacionController::class, 'update']);
Route::delete('/fichas-formacion/{id}', [FichaFormacionController::class, 'destroy']);


Route::get('/sitios', [SitioController::class, 'index']);
Route::get('/sitios/{id}', [SitioController::class, 'show']);
Route::post('/sitios', [SitioController::class, 'store']);
Route::put('/sitios/{id}', [SitioController::class, 'update']);
Route::delete('/sitios/{id}', [SitioController::class, 'destroy']);


Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);


Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);


Route::get('/permisos', [PermisoController::class, 'index']);
Route::get('/permisos/{id}', [PermisoController::class, 'show']);
Route::post('/permisos', [PermisoController::class, 'store']);
Route::put('/permisos/{id}', [PermisoController::class, 'update']);
Route::delete('/permisos/{id}', [PermisoController::class, 'destroy']);


Route::get('/inventario', [InventarioController::class, 'index']);
Route::get('/inventario/{id}', [InventarioController::class, 'show']);
Route::post('/inventario', [InventarioController::class, 'store']);
Route::put('/inventario/{id}', [InventarioController::class, 'update']);
Route::delete('/inventario/{id}', [InventarioController::class, 'destroy']);


Route::get('/solicitudes', [SolicitudController::class, 'index']);
Route::get('/solicitudes/{id}', [SolicitudController::class, 'show']);
Route::post('/solicitudes', [SolicitudController::class, 'store']);
Route::put('/solicitudes/{id}', [SolicitudController::class, 'update']);
Route::delete('/solicitudes/{id}', [SolicitudController::class, 'destroy']);


Route::get('/detalles-solicitud', [DetalleSolicitudController::class, 'index']);
Route::get('/detalles-solicitud/{id}', [DetalleSolicitudController::class, 'show']);
Route::post('/detalles-solicitud', [DetalleSolicitudController::class, 'store']);
Route::put('/detalles-solicitud/{id}', [DetalleSolicitudController::class, 'update']);
Route::delete('/detalles-solicitud/{id}', [DetalleSolicitudController::class, 'destroy']);


Route::get('/entregas-material', [EntregaMaterialController::class, 'index']);
Route::get('/entregas-material/{id}', [EntregaMaterialController::class, 'show']);
Route::post('/entregas-material', [EntregaMaterialController::class, 'store']);
Route::put('/entregas-material/{id}', [EntregaMaterialController::class, 'update']);
Route::delete('/entregas-material/{id}', [EntregaMaterialController::class, 'destroy']);

Route::get('/movimientos', [MovimientoController::class, 'index']);
Route::get('/movimientos/{id}', [MovimientoController::class, 'show']);
Route::post('/movimientos', [MovimientoController::class, 'store']);
Route::put('/movimientos/{id}', [MovimientoController::class, 'update']);
Route::delete('/movimientos/{id}', [MovimientoController::class, 'destroy']);

Route::post('/login', [AuthController::class, 'login']);