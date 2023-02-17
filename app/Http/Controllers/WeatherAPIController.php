<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherAPIController extends Controller
{
    public function index() {
        $weather_data = '';
  
        return view('index', compact('weather_data'));
    }

    public function search(Request $request) {

        $zip1 = $request->query('zip1');
        $zip2 = $request->query('zip2');

        $weather_data = $this->weatherData($zip1, $zip2);

        return view('index', compact('weather_data'));
    }

    public function weatherData($zip1, $zip2) {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');
        $zip = "$zip1-$zip2";
       
        $url = "$base_url?units=metric&q=$zip&APPID=$API_KEY&lang=ja";

        // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);
        $weather_data = $response->getBody();

        return json_decode($weather_data, true);
    }
}

