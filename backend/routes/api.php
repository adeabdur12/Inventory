<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/item',[ItemController::class,'index']);
Route::get('/item/{id}',[ItemController::class,'show']);
Route::delete('/item/{id}',[ItemController::class,'destroy']);
Route::post('/item',[ItemController::class,'store']);
Route::put('/item/{id}',[ItemController::class,'update']);

Route::get('/customer',[CustomerController::class,'index']);
Route::get('/customer/{id}',[CustomerController::class,'show']);
Route::post('/customer',[CustomerController::class,'store']);
Route::delete('/customer/{id}',[CustomerController::class,'destroy']);
Route::put('/customer/{id}',[CustomerController::class,'update']);

Route::get('/sales',[SalesController::class,'index']);
Route::get('/sales/{id}',[SalesController::class,'show']);
Route::post('/sales',[SalesController::class,'store']);
Route::delete('/sales/{id}',[SalesController::class,'destroy']);
Route::put('/sales/{id}',[SalesController::class,'update']);
