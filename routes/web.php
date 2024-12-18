<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\TransbankController;

//rutas sin autenticacion
Route::get('/', [DashboardController::class,'index']);
Route::get('/licencia', function () {
    return view('emails.licencia');
});
//rutas autenticadas
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
        Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
        Route::get('/step2/{id}', [DashboardController::class,'step2'])->name('Step2');
        Route::get('/Calendar', [DashboardController::class,'calendar'])->name('Calendar');
        Route::get('/form-salud', [DashboardController::class,'formularioSalud'])->name('formularioSalud');
        Route::get('/documentos', [DashboardController::class,'documentos'])->name('documentos');
        Route::get('/finalizado', [DashboardController::class,'finalizado'])->name('finalizado');
      
        Route::resource('/roles', RoleController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/solicitudes', SolicitudesController::class); 
        Route::get('/reportes',[ DashboardController::class,'reportes'])->name('reportes.index'); 
});
