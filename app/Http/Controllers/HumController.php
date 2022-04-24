<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Humedad;

//Humedad
class HumController extends Controller
{

public function get_mostrarHum ()
{
  $client = new Client();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/humvalue/data', [
    'headers'=>['X-AIO-key', 'aio_bmll118GUg6Mg4NEm9pDH9g8CCAB']
  ])->getBody();
}

public function post_registro_Hum (Request $R)
{
  $Registro_Hum = new Humedad ();
  $Registro_Hum ->datos = $R->datos;
  $Registro_Hum->save();
  return $Registro_Hum;
}

public function get_HumMostrarReg (Request $R)
{
  $Registro_Hum = Humedad :: all();
  return $Registro_Hum;
}

public function put_registroHum (int $id, Request $R)
{
  $Registro_Hum = Humedad::find($id);
  $Registro_Hum->datos = $R->datos;  
  $Registro_Hum->save();
  return Humedad::all();

}

public function delete_regisHum (int $id)
{
  $Registro_Hum = Humedad::find ($id);
  $Registro_Hum -> delete();
  return Humedad::all();
}



}