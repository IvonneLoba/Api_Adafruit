<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class AdafruitController extends Controller
{
    //
    public function led()
    {
 $client = new Client();
 return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/movimiento/data?limit=1', [
   'headers' => ['X-AIO-Key', 'aio_NYzz77Wb5bVt9xObKcBRaic7I7KU']
])->getBody();
    }
    public function enviarled(Request $request)
	{
		$client = new Client();

		return $client->request('POST', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/led/data',		[
			'headers' => ['X-AIO-Key' => 'aio_NYzz77Wb5bVt9xObKcBRaic7I7KU'],
			'form_params' => ['value' => $request['led']]
		])->getBody();
}

public function get_mostrarDist ()
{
  $client = new Client();

  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/distvalue/data', [
    'headers' => ['X-AIO-Key', 'aio_NYzz77Wb5bVt9xObKcBRaic7I7KU']
 ])->getBody();
}

public function get_mostrarHum ()
{
  $client = new Client();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/humvalue/data', [
    'headers'=>['X-AIO-key', 'aio_NYzz77Wb5bVt9xObKcBRaic7I7KU']
    ])->getBody();
}

public function get_mostrarTem ()
{
  $client = new Cliente();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/temp/data', [
     'headers'=> ['X-AIO-key', 'aio_NYzz77Wb5bVt9xObKcBRaic7I7KU']
  ])->getBody();
}

public function post_groups (Request $request)
{
  $client = new Client();
  return $client->request('POST', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/groups',
  [
     'headers'=>['X-AIO-Key', 'aio_NYzz77Wb5bVt9xObKcBRaic7I7KU'],
     'form_params' => ['group' => $request['group']]
  ])->getBody();
}

}

