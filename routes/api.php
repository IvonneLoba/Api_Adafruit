<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdafruitController;
use App\Http\Controllers\DistController;
use App\Http\Controllers\HumController;
use App\Http\Controllers\MovController;
use App\Http\Controllers\PesoController;
use App\Http\Controllers\TemController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('register', [ApiController::class, 'register']);
//Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');

//1-Sensor de Luz

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

//2-Sensor de Distancia, solo se obtiene lectura; no se manda información.
Route::get('get_mostrarDist/mostrar', [DistController::class, 'get_mostrarDist']);

//3-Sensor de Humedad, igual que el anterior, solo se obtiene lectura.
Route::get('get_mostrarHum/mostrar', [HumController::class, 'get_mostrarHum']);

//4-Sensor de Temperatura,   "   "   "   ".
Route::get('get_mostrarTem/mostrar', [TemController::class, 'get_mostrarTem']);

//5-Sensor Movimiento
Route::get('get_mostrarMov/mostrar', [MovController::class, 'get_mostrarMov']);

//6-Sensor Peso
Route::get('get_mostrarPeso/mostrar', [PesoController::class, 'get_mostrarPeso']);

//Conslta Usuario
Route::get('get_mostrarusuario/mostrar', [UserController::class, 'get_mostrarusuario']);

//Route::get('/prueba', function(){
  //  return 'holla';
//})->name('user');

///////////////////////////////////////////////////////////////////////////////////////////////////////////


//Grupo Sensores
Route::prefix('AdafruitController')->group (function (){
    Route::get('get_UserController/get_mostrarusuario', [UserController::class, 'get_mostrarusuario']);
    Route::get('get_AdafruitController/get_mostrarDist', [AdafruitController::class, 'get_mostrarDist']);
    Route::get('get_AdafruitController/get_mostrarHum', [AdafruitController::class, 'get_mostrarHum']);
    Route::get('get_AdafruitController/get_mostrarTem', [AdafruitController::class, 'get_mostrarTem']);
    Route::get('get_AdafruitController/get_mostrarMov', [AdafruitController::class, 'get_mostrarMov']);
    Route::get('get_AdafruitController/get_mostrarPeso', [AdafruitController::class, 'get_mostrarPeso']);
    
 });

 //------------------------------------------------------------------------------------------------------//





//Sensor Tarjeta(wifi)
//Route::get('get_motrarTarjeta/mostrar', [AdafruitController::class, 'get_motrarTarjeta']);

//Grupo de Sensores
//Route::post('post_groups/mostrargrupo', [AdafruitController::class, 'post_groups']);