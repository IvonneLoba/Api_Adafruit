<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdafruitController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('register', [ApiController::class, 'register']);
//Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');


//Sensor de Luz

Route::get('/mostrarled', [AdafruitController::class,'led']);
Route::post('/enviarled', [AdafruitController::class, 'enviarled']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('create', [ProductController::class, 'store']);
    Route::put('update/{product}',  [ProductController::class, 'update']);
    Route::delete('delete/{product}',  [ProductController::class, 'destroy']);
});

//Sensor de Distancia, solo se obtiene lectura; no se manda información.
Route::get('get_mostrarDist/mostrar', [AdafruitController::class, 'get_mostrarDist']);

//Sensor de Humedad, igual que el anterior, solo se obtiene lectura.
Route::get('get_mostrarHum/mostrar', [AdafruitController::class, 'get_mostrarHum']);

//Sensor de Temperatura,   "   "   "   ".
Route::get('get_mostrarTem/mostrar', [AdafruitController::class, 'get_mostrarTem']);

//Grupo de Sensores
Route::post('post_groups/mostrargrupo', [AdafruitController::class, 'post_groups']);