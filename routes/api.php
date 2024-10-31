<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users',[UserController::class,'index']);
Route::post('/create-user',[UserController::class,'create']);
Route::post('/update-user',[UserController::class,'update']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
