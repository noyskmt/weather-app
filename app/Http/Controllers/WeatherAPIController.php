<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherAPIController extends Controller
{
    public function index(Request $request) {
        // \Log::debug($request);

        //インスタンス作成が必要？ 

        $zip1 = $request->query('zip1');
        $zip2 = $request->query('zip2');

        $weather_data =  $this->weatherData($zip1, $zip2);
        // $weather_data = redirect($this->weatherData($zip1, $zip2));

        return view('index', compact('weather_data','zip1','zip2'));
        // return view('index')->with('weather_data', $weather_data])

        // return view('index');
        // return view('index')->with(['weather_data' => response()->json($weather_data)]);
        // return view('index', compact('weather_data'));
        // jsonで表示させる方法
    }

    public function weatherData($zip1, $zip2) {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');
        // 動的にするときにzip1とzip2を入れ込む
        $zip = '870-0030,jp';
       
        $url = "$base_url?units=metric&q=$zip&APPID=$API_KEY";

        // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);

        return response()->json($weather_data);

    }
}
