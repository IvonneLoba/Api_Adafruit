<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Movimiento;

//Movimiento
class MovController extends Controller
{

public function get_mostrarMov()
{
  $client = new Client();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/movimiento/data', [
    'headers'=> ['X-AIO-key', 'aio_bmll118GUg6Mg4NEm9pDH9g8CCAB']
  ])->getBody();
}

public function post_registro_Mov (Request $R)
{
  $Registro_Mov = new Movimiento ();
  $Registro_Mov ->datos = $R->datos;
  $Registro_Mov->save();
  return $Registro_Mov;
}

public function get_MovMostrarReg (Request $R)
{
  $Registro_Mov = Movimiento :: all();
  return $Registro_Mov;
}

public function put_registroMov (int $id, Request $R)
{
  $Registro_Mov = Movimiento::find($id);
  $Registro_Mov->datos = $R->datos;  
  $Registro_Mov->save();
  return Movimiento::all();
}

public function delete_regisMov (int $id)
{
  $Registro_Mov = Movimiento::find ($id);
  $Registro_Mov -> delete();
  return Movimiento::all();
}
}
