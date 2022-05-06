<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiCuentaController;
use App\Http\Controllers\Backend\RolController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\FrontEnd\BlogController;
use App\Http\Controllers\Backend\MenuRolController;
use App\Http\Controllers\Backend\PermisoController;
use App\Http\Controllers\Backend\CategoriaController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermisoRolController;
use App\Http\Controllers\FrontEnd\ComentarioController;

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

     /** Rutas Categoría */
     Route::get('categoria', [CategoriaController::class, 'index'])->name('categoria');
     Route::post('categoria/crear', [CategoriaController::class, 'crear'])->name('categoria.crear');
     Route::put('categoria/{id}/editar', [CategoriaController::class, 'editar'])->name('categoria.editar');
     Route::post('categoria', [CategoriaController::class, 'guardar'])->name('categoria.guardar');
     Route::put('categoria/{id}', [CategoriaController::class, 'actualizar'])->name('categoria.actualizar');
     Route::delete('categoria/{id}/eliminar', [CategoriaController::class, 'eliminar'])->name('categoria.eliminar');

      /* Rutas de Tag */
    Route::get('tag', [TagController::class, 'index'])->name('tag');
    Route::get('tag/crear', [TagController::class, 'crear'])->name('tag.crear');
    Route::get('tag/{id}/editar', [TagController::class, 'editar'])->name('tag.editar');
    Route::post('tag', [TagController::class, 'guardar'])->name('tag.guardar');
    Route::put('tag/{id}', [TagController::class, 'actualizar'])->name('tag.actualizar');
    Route::delete('tag/{id}', [TagController::class, 'eliminar'])->name('tag.eliminar');

       /** Rutas Post */
    Route::get('post', [PostController::class, 'index'])->name('post');
    Route::get('post/crear', [PostController::class, 'crear'])->name('post.crear');
    Route::get('post/{post}/editar', [PostController::class, 'editar'])->name('post.editar');
    Route::post('post', [PostController::class, 'guardar'])->name('post.guardar');
    Route::post('post/{post}', [PostController::class, 'mostrar'])->name('post.mostrar');
    Route::put('post/{post}', [PostController::class, 'actualizar'])->name('post.actualizar');
    Route::delete('post/{post}/eliminar', [PostController::class, 'eliminar'])->name('post.eliminar');

});

Route::get('mi-cuenta', [MiCuentaController::class, 'index'])->middleware('auth')->name('mi-cuenta');
Route::post('mi-cuenta', [MiCuentaController::class, 'guardar'])->middleware('auth')->name('mi-cuenta.guardar');
Route::post('comentario/{post}', [ComentarioController::class, 'guardar'])->middleware('auth')->name('comentario.guardar');
Route::get('/', [BlogController::class, 'index'])->name('inicio');
Route::get('categoria/{slug}', [BlogController::class, 'categoria'])->name('blog.categoria');
Route::get('tag/{slug}', [BlogController::class, 'tag'])->name('blog.tag');
Route::get('articulo/{slug}', [BlogController::class, 'mostrar'])->name('blog.mostrar');