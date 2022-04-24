<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Distancia;

//Distancia

class DistController extends Controller
{

public function get_mostrarDist ()
{
  $client = new Client();

  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/distvalue/data', [
    'headers' => ['X-AIO-Key', 'aio_bmll118GUg6Mg4NEm9pDH9g8CCAB']
 ])->getBody();
}

public function post_registro_Dist (Request $R)
{
  $Registro_Dist = new Distancia ();
  $Registro_Dist ->datos = $R->datos;
  $Registro_Dist->save();
  return $Registro_Dist;
}

public function put_registroDist (Request $R)
{
  $Registro_Dist = $client::find($id);
  $Registro_Dist->datos = $R->datos;  

}

public function delete_regisDist (int $id)
{
  $Registro_Dist = Registro_Dist :: find ($id);
  $Registro_Dist = delete();
  return Registro_Dist::all();
}

}
