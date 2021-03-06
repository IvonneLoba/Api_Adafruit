<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Adafruit;

class AdafruitController extends Controller
{
    //
    public function led()
    {
 $client = new Client();
 return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/movimiento/data?limit=1', [
   'headers' => ['X-AIO-Key', 'aio_bmll118GUg6Mg4NEm9pDH9g8CCAB']
])->getBody();
    }
    public function enviarled(Request $request)
	{
		$client = new Client();

		return $client->request('POST', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/led/data',		[
			'headers' => ['X-AIO-Key' => 'aio_bmll118GUg6Mg4NEm9pDH9g8CCAB'],
			'form_params' => ['value' => $request['led']]
		])->getBody();
  }

    public function post_registro_Led (Request $R)
{
  $Registro_Led = new Adafruit ();
  $Registro_Led ->datos = $R->datos;
  $Registro_Led ->save();
  return $Registro_Led;
}

public function get_LedMostrarReg (Request $R)
{
  $Registro_Led = Adafruit::all();
  return $Registro_Led;
}

public function put_registroLed (int $id, Request $R)
{
  $Registro_Led = Adafruit::find($id);
  $Registro_Led ->datos = $R->datos;  
  $Registro_Led ->save();
  return Adafruit::all();
}

public function delete_regisLed (int $id)
{
  $Registro_Led = Adafruit::find ($id);
  $Registro_Led -> delete();
  return Adafruit::all();
}


public function post_groups (Request $request)
{
  $resp=Http::post('https://io.adafruit.com/api/v2/IvonneLoba/groups',
  [
    'X-AIO-Key'=>'aio_mgDD898qB7b30hHwCvEtrojBGaOF',
     'name' => $request->name
  ]);
  return $resp;
}

public function get_groups (Request $request)
{///api/v2/{username}/groups/{group_key}/feeds
  $resp=Http::get('https://io.adafruit.com/api/v2/IvonneLoba/groups/incubadora1/feeds',
  [
    'X-AIO-Key'=>'aio_mgDD898qB7b30hHwCvEtrojBGaOF'
  ]);
  return $resp;
}


//api/v2/{username}/feeds
public function post_feeds(Request $request)
{
  $resp=Http::post('https://io.adafruit.com/api/v2/IvonneLoba/feeds',
  [
    'X-AIO-Key'=>'aio_mgDD898qB7b30hHwCvEtrojBGaOF',
     'name' => $request->name
  ]);
  return $resp;
}

///api/v2/{username}/groups/{group_key}/feeds

public function post_incubadora1(Request $request)
{
  $resp=Http::post('https://io.adafruit.com/api/v2/IvonneLoba/groups/incubadora1/feeds',
  [
    'X-AIO-Key'=>'aio_mgDD898qB7b30hHwCvEtrojBGaOF',
     'name' => $request->name
  ]);
  return $resp;
}


//public function get_motrarTarjeta()
//{
  //return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/tarjeta/data', [
    //'headers'=> ['X-AIO-key', 'aio_bmll118GUg6Mg4NEm9pDH9g8CCAB']
  //])->getBody();
//}



}

