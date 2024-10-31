<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;


//rutas sin autenticacion
Route::get('/', [DashboardController::class,'index']);

//rutas autenticadas
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
        Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
        Route::resource('/roles', RoleController::class);
        Route::resource('/usuarios', RoleController::class); 
});
