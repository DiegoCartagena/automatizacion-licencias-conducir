<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;


//rutas sin autenticacion
Route::get('/', [DashboardController::class,'index']);
Route::get('/licencia', function () {
    return view('emails.licencia');
});
//rutas autenticadas
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
        Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
        Route::resource('/roles', RoleController::class);
        Route::resource('/user', UserController::class); 
});
