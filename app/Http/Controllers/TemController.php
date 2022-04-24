<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Temperatura;

//Temperatura
class TemController extends Controller
{
public function get_mostrarTem ()
{
  $client = new Client();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/temp/data', [
     'headers'=> ['X-AIO-key', 'aio_bmll118GUg6Mg4NEm9pDH9g8CCAB']
  ])->getBody();
}

public function post_registro_Tem (Request $R)
{
  $Registro_Tem = new Temperatura ();
  $Registro_Tem ->datos = $R->datos;
  $Registro_Tem ->save();
  return $Registro_Tem;
}

public function get_TemMostrarReg (Request $R)
{
  $Registro_Tem = Temperatura::all();
  return $Registro_Tem;
}

public function put_registroTem (int $id, Request $R)
{
  $Registro_Tem = Temperatura::find($id);
  $Registro_Tem ->datos = $R->datos;  
  $Registro_Tem ->save();
  return Temperatura::all();
}

public function delete_regisTem (int $id)
{
  $Registro_Tem = Temperatura::find ($id);
  $Registro_Tem -> delete();
  return Temperatura::all();
}

}
