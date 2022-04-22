<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class DistController extends Controller
{
    public function get_mostrarDist ()
{
  $client = new Client();

  return $client->request('GET', 'https://io.adafruit.com/api/v2/Yocelyn_Contreras09/feeds/distvalue/data', [
    'headers' => ['X-AIO-Key', 'aio_abnx18WMwwOdUkWiWJRDskUtL718']
 ])->getBody();
}
}
