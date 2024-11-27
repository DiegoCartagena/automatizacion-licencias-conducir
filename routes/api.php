<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransbankController;
use App\Http\Controllers\LicenciasController;
use App\Http\Controllers\TipoTramiteController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SolicitudesController;

//user routes
Route::get('/users',[UserController::class,'listar']);
Route::post('/create-user',[UserController::class,'create']);
Route::post('/update-user',[UserController::class,'update']);
Route::post('/find-user',[UserController::class,'show']);
Route::post('/delete-user',[UserController::class,'destroy']);

//pagos
Route::post('/start_pago',[TransbankController::class,'crear_compra']);
Route::get('/confirmar_pago',[TransbankController::class,'confirmar_pago'])->name('confirmar_pago');

//Licencias 
Route::post('/create-licencia',[LicenciasController::class,'create']);
Route::get('/get-licencias',[LicenciasController::class,'listar']);
Route::post('/editar-licencia',[LicenciasController::class,'edit']);
Route::delete('/eliminar-licencia',[LicenciasController::class,'destroy']);
Route::post('/find-licencia',[LicenciasController::class,'show']);

//tipo tramite
Route::get('/get-tipos-tramite',[TipoTramiteController::class,'listar']);
Route::post('/create-tramite',[TipoTramiteController::class,'create']);
Route::post('/editar-tramite',[TipoTramiteController::class,'edit']);
Route::delete('/delete-tramite',[TipoTramiteController::class,'destroy']);

//documentos
Route::get('/get-documentos',[DocumentosController::class,'listar']);
Route::post('/create-documento',[DocumentosController::class,'create']);
Route::post('/editar-documento',[DocumentosController::class,'edit']);
Route::delete('/delete-documento',[DocumentosController::class,'destroy']);
Route::post('/find-documento',[DocumentosController::class,'show']);

//roles
Route::get('/get-roles',[RoleController::class,'listar']);
Route::post('/create-rol',[RoleController::class,'create']);
Route::post('/editar-rol',[RoleController::class,'edit']);
Route::post('/delete-rol',[RoleController::class,'destroy']);
//mails
Route::get('/send-mail',[EmailController::class,'sendEmail']);
//Solicitudes
Route::get('/get-solicitudes',[SolicitudesController::class,'listar']);
Route::post('/create-solicitud',[SolicitudesController::class,'create']);
Route::post('/edit-solicitud',[SolicitudesController::class,'edit']);
Route::delete('/delete-solicitud',[SolicitudesController::class,'destroy']);

//auth routes
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
