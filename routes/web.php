<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\MaestrosController;
use App\Models\Carrera;
use Illuminate\Support\Facades\Route;

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
    $carreras=Carrera::all();
    return view('welcome',compact("carreras"));
});
Route::get('/alumnos',[AlumnoController::class,'index'])->name('alumnos.index');    
Route::post('/alumnos',[AlumnoController::class,'store'])->name('alumnos.store');    
Route::get('/alumnos/login',[AlumnoController::class,'loginView'])->name('alumnos.loginView');    
Route::post('/alumnos/login',[AlumnoController::class,'login'])->name('alumnos.login');    

Route::get('/maestros/login',[MaestrosController::class,'loginView'])->name('maestros.loginView');
Route::post('/maestros/login',[MaestrosController::class,'login'])->name('maestros.login');    
Route::get('/maestros/login2',[MaestrosController::class,'login2'])->name('maestros.login2');    
Route::get('/maestros',[MaestrosController::class,'index'])->name('maestros.index');    
Route::post('/maestros',[MaestrosController::class,'store'])->name('maestros.store');    

Route::get('/calificaciones',[CalificacionesController::class,"show"])->name('calificaciones.show');
Route::post('/calificaciones/edit',[CalificacionesController::class,"edit"])->name('calificaciones.edit');
Route::get('/calificaciones/volver',[CalificacionesController::class,"volver"])->name('calificaciones.volver');


Route::get('/materias/agregar',[AlumnoController::class,"agregarMaterias"])->name('materias.agregar');
Route::get('/materias/cargar',[AlumnoController::class,"cargarMaterias"])->name('materias.cargar');