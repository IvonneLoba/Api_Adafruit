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
   'headers' => ['X-AIO-Key', 'aio_ALNX33MRSmwsNXUM2fQmcyh1VT7h']
])->getBody();
    }
    public function enviarled(Request $request)
	{
		$client = new Client();

		return $client->request('POST', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/led/data',		[
			'headers' => ['X-AIO-Key' => 'aio_ALNX33MRSmwsNXUM2fQmcyh1VT7h'],
			'form_params' => ['value' => $request['led']]
		])->getBody();
}

public function get_mostrarDist ()
{
  $client = new Client();

  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/distvalue/data', [
    'headers' => ['X-AIO-Key', 'aio_ALNX33MRSmwsNXUM2fQmcyh1VT7h']
 ])->getBody();
}

public function get_mostrarHum ()
{
  $client = new Client();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/humvalue/data', [
    'headers'=>['X-AIO-key', 'aio_ALNX33MRSmwsNXUM2fQmcyh1VT7h']
  ])->getBody();
}

public function get_mostrarTem ()
{
  $client = new Client();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/temp/data', [
     'headers'=> ['X-AIO-key', 'aio_ALNX33MRSmwsNXUM2fQmcyh1VT7h']
  ])->getBody();
}

public function get_mostrarMov()
{
  $client = new Client();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/movimiento/data', [
    'headers'=> ['X-AIO-key', 'aio_ALNX33MRSmwsNXUM2fQmcyh1VT7h']
  ])->getBody();
}

public function get_mostrarPeso()
{
  $client = new Client();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/peso/data', [
    'headers'=> ['X-AIO-key', 'aio_ALNX33MRSmwsNXUM2fQmcyh1VT7h']
  ])->getBody();
}

//public function get_motrarTarjeta()
//{
  //return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/tarjeta/data', [
    //'headers'=> ['X-AIO-key', 'aio_ALNX33MRSmwsNXUM2fQmcyh1VT7h']
  //])->getBody();
//}

//public function post_groups (Request $request)
//{
  //$client = new Client();
  //return $client->request('POST', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/groups',
  //[
    // 'headers'=>['X-AIO-Key', 'aio_ALNX33MRSmwsNXUM2fQmcyh1VT7h'],
     //'form_params' => ['group' => $request['group']]
  //])->getBody();
//}

}

