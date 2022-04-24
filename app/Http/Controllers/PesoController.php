<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Peso;

//Peso
class PesoController extends Controller
{
public function get_mostrarPeso()
{
  $client = new Client();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/peso/data', [
    'headers'=> ['X-AIO-key', 'aio_bmll118GUg6Mg4NEm9pDH9g8CCAB']
  ])->getBody();
}

public function post_registro_Peso (Request $R)
{
  $Registro_Peso = new Peso ();
  $Registro_Peso ->datos = $R->datos;
  $Registro_Peso ->save();
  return $Registro_Peso;
}

public function get_PesoMostrarReg (Request $R)
{
  $Registro_Peso = Peso::all();
  return $Registro_Peso;
}

public function put_registroPeso (int $id, Request $R)
{
  $Registro_Peso = Peso::find($id);
  $Registro_Peso->datos = $R->datos;  
  $Registro_Peso->save();
  return Peso::all();
}

public function delete_regisPeso (int $id)
{
  $Registro_Peso = Peso::find ($id);
  $Registro_Peso -> delete();
  return Peso::all();
}

}
