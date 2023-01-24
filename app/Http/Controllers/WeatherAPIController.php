<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherAPIController extends Controller
{
    public function index() {
        $weather_data = "weather_data";
        return view('index')->with(['weather_data' => $weather_data]);
        // return view('index', compact('weather_data'));
    }

    public function weatherData() {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');
        // $zip = '870-0030,jp';
        // $zip = '$_GET["post_code"],jp';
        $zip = $this->input()->get('post_code');



        $url = "$base_url?units=metric&q=$zip&APPID=$API_KEY";

        // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);

        return response()->json($weather_data);

        // $res = $req->input('postal_code');
        // return view('index.blade', ['postal_code' => $res]);
        // 1/18 フォームから内容を受け取るメソッド
    }
}
