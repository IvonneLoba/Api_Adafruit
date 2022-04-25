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
use App\Http\Controllers\AdminController;


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

//Consulta Usuario
Route::get('get_mostrarusuario/mostrar', [UserController::class, 'get_mostrarusuario']);

//Route::get('/prueba', function(){
  //  return 'holla';
//})->name('user');

///////////////////////////////////////////////////////////////////////////////////////////////////////////

//Grupo Usuarios
Route::prefix('GrupoUsuarios')->group (function (){
    Route::get('get_UserController/get_mostrarusuario', [UserController::class, 'get_mostrarusuario']);

    
 });

//Grupos Sensores

Route::prefix('GrupoLed')->group (function (){

    Route::post('enviarled', [AdafruitController::class, 'enviarled']);  
    Route::get('get_mostrarled', [AdafruitController::class, 'get_mostrarled']);
    Route::post('post_registro_Led', [AdafruitController::class, 'post_registro_Led']);
    Route::get('get_LedMostrarReg', [AdafruitController::class, 'get_LedMostrarReg']);
    Route::put('put_registroLed/{id}', [AdafruitController::class, 'put_registroLed']);
    Route::delete('delete_regisLed/{id}', [AdafruitController::class, 'delete_regisLed']); 
    
 });

Route::prefix('GrupoDist')->group (function (){
  
    Route::get('get_mostrarDist', [DistController::class, 'get_mostrarDist']);
    Route::post('post_registro_Dist', [DistController::class, 'post_registro_Dist']);
    Route::get('get_DistMostrarReg', [DistController::class, 'get_DistMostrarReg']);
    Route::put('put_registroDist/{id}', [DistController::class, 'put_registroDist']);
    Route::delete('delete_regisDist/{id}', [DistController::class, 'delete_regisDist']);    
 });

 Route::prefix('GrupoHum')->group (function (){
  
    Route::get('get_mostrarHum', [HumController::class, 'get_mostrarHum']);
    Route::post('post_registro_Hum', [HumController::class, 'post_registro_Hum']);
    Route::get('get_HumMostrarReg', [HumController::class, 'get_HumMostrarReg']);
    Route::put('put_registroHum/{id}', [HumController::class, 'put_registroHum']);
    Route::delete('delete_regisHum/{id}', [HumController::class, 'delete_regisHum']);    
    
 });

 Route::prefix('GrupoMov')->group (function (){

    Route::get('get_mostrarMov', [MovController::class, 'get_mostrarMov']);
    Route::post('post_registro_Mov', [MovController::class, 'post_registro_Mov']);
    Route::get('get_MovMostrarReg', [MovController::class, 'get_MovMostrarReg']);
    Route::put('put_registroMov/{id}', [MovController::class, 'put_registroMov']);
    Route::delete('delete_regisMov/{id}', [MovController::class, 'delete_regisMov']);     
 });

 Route::prefix('GrupoPeso')->group (function (){
  
    Route::get('get_mostrarPeso', [PesoController::class, 'get_mostrarPeso']);
    Route::post('post_registro_Peso', [PesoController::class, 'post_registro_Peso']);
    Route::get('get_PesoMostrarReg', [PesoController::class, 'get_PesoMostrarReg']);
    Route::put('put_registroPeso/{id}', [PesoController::class, 'put_registroPeso']);
    Route::delete('delete_regisPeso/{id}', [PesoController::class, 'delete_regisPeso']);     
 });

 Route::prefix('GrupoTem')->group (function (){

    Route::get('get_mostrarTem', [TemController::class, 'get_mostrarTem']);
    Route::post('post_registro_Tem', [TemController::class, 'post_registro_Tem']);
    Route::get('get_TemMostrarReg', [TemController::class, 'get_TemMostrarReg']);
    Route::put('put_registroTem/{id}', [TemController::class, 'put_registroTem']);
    Route::delete('delete_regisTem/{id}', [TemController::class, 'delete_regisTem']);         
 });

 Route::prefix('GrupoIncubadoras')->group (function (){
     Route::get('get_Incubadoras', [AdminController::class, 'get_Incubadoras']);
     

 });
 
 //------------------------------------------------------------------------------------------------------//








//Sensor Tarjeta(wifi)
//Route::get('get_motrarTarjeta/mostrar', [AdafruitController::class, 'get_motrarTarjeta']);

//Grupo de Sensores
//Route::post('post_groups/mostrargrupo', [AdafruitController::class, 'post_groups']);