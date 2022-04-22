<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiCuentaController;
use App\Http\Controllers\Backend\RolController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuRolController;
use App\Http\Controllers\Backend\PermisoController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermisoRolController;

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

Route::get('/', function () {
    return view('theme.front.index');
})->name('inicio');

Route::get('mi-cuenta', [MiCuentaController::class, 'index'])->middleware('auth')->name('mi-cuenta');

Route::group(['prefix'=>'admin-backend', 'middleware' => ['auth', 'superadministrador']],function(){
    //Routas del menu
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
    Route::get('menu/crear', [MenuController::class, 'crear'])->name('menu.crear');
    Route::get('menu/{id}/editar', [MenuController::class, 'editar'])->name('menu.editar');
    Route::post('menu', [MenuController::class, 'guardar'])->name('menu.guardar');
    Route::post('menu/guardar-orden', [MenuController::class, 'guardarOrden'])->name('menu.orden');
    Route::put('menu/{id}', [MenuController::class, 'actualizar'])->name('menu.actualizar');
    Route::delete('menu/{id}/eliminar', [MenuController::class, 'eliminar'])->name('menu.eliminar');   
     

    /*RUTAS DEL MENU ROL */
    Route::get('menu-rol', [MenuRolController::class, 'index'])->name('menu-rol');
    Route::post('menu-rol', [MenuRolController::class, 'guardar'])->name('menu-rol.guardar');

     /* Rutas de Roles */
     Route::get('rol', [RolController::class, 'index'])->name('rol');
     Route::get('rol/crear', [RolController::class, 'crear'])->name('rol.crear');
     Route::get('rol/{rol}/editar', [RolController::class, 'editar'])->name('rol.editar');
     Route::post('rol', [RolController::class, 'guardar'])->name('rol.guardar');
     Route::put('rol/{rol}', [RolController::class, 'actualizar'])->name('rol.actualizar');
     Route::delete('rol/{rol}/eliminar', [RolController::class, 'eliminar'])->name('rol.eliminar');

     /* Rutas de Permiso */
     Route::get('permiso', [PermisoController::class, 'index'])->name('permiso');
     Route::get('permiso/crear', [PermisoController::class, 'crear'])->name('permiso.crear');
     Route::get('permiso/{id}/editar', [PermisoController::class, 'editar'])->name('permiso.editar');
     Route::post('permiso', [PermisoController::class, 'guardar'])->name('permiso.guardar');
     Route::put('permiso/{id}', [PermisoController::class, 'actualizar'])->name('permiso.actualizar');
     Route::delete('permiso/{id}/eliminar', [PermisoController::class, 'eliminar'])->name('permiso.eliminar');

     /* Rutas de Permiso-Rol */
    Route::get('permiso-rol', [PermisoRolController::class, 'index'])->name('permiso-rol');
    Route::post('permiso-rol', [PermisoRolController::class, 'guardar'])->name('permiso-rol.guardar');
});