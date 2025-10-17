<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZonaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/zonas',[ZoneController::class,'obtenerZonas']);
Route::get('/zonas{idzona}',[ZoneController::class,'obtenerZona']);