<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class PesoController extends Controller
{
    public function get_mostrarPeso()
{
  $client = new Client();
  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/peso/data', [
    'headers'=> ['X-AIO-key', 'aio_ALNX33MRSmwsNXUM2fQmcyh1VT7h']
  ])->getBody();
}
}