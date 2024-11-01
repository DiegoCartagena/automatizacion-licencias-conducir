<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransbankController;

Route::get('/users',[UserController::class,'index']);
Route::post('/create-user',[UserController::class,'create']);
Route::post('/update-user',[UserController::class,'update']);
Route::post('/find-user',[UserController::class,'show']);
Route::delete('/delete-user',[UserController::class,'destroy']);

Route::post('/start_pago',[TransbankController::class,'crear_compra']);
Route::get('/confirmar_pago',[TransbankController::class,'confirmar_pago'])->name('confirmar_pago');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
