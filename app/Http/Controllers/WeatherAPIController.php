<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
// use App\Http\Controllers\DateTime;

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
        // dd($weather_data);

        return view('index', compact('weather_data'));
    }

    public function weatherData($zip1, $zip2) {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');
        // 動的にするときにzip1とzip2を入れ込む
        $zip = '870-0030,jp';
       
        $url = "$base_url?units=metric&q=$zip&APPID=$API_KEY&lang=ja";

        // $day = new DateTime($weather_data);
        // $day->format('n月j日 G時');
        // public string DateTime::format (string $n月j日 H時);

        // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);
        $weather_data = $response->getBody();

        // $format = 'n月j日 G時';
        // $date = DateTime::createFormat($format);
        // $date->format('n月j日 G時');

        return json_decode($weather_data, true);
    }
    



    
    // APIデータ確認用
    public function weatherDataa() {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');
        $zip = '870-0030,jp';
       
        $url = "$base_url?units=metric&q=$zip&APPID=$API_KEY";

        // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);
        
        return response()->json($weather_data['list']);
    }
}

