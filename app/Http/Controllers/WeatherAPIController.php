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
        // dd($weather_data);

        return view('index', compact('weather_data'));
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
        // $data = array_column($weather_data,'dt_txt');


        return response()->json($weather_data['list']);
    }
    // 配列
    //  $list = [
    //     (key1[0])[
    //                 dt=>'...', 
    //                 main[temp=>'...', ~temp_kf=>'...'], 
    //                 weather[id=>'...'~],
    //                 clouds[''],
    //                 wind[''],
    //                 visibility=>'',
    //                 pop=>'',
    //                 sys[''],
    //                 dt_txt=>'',
    //             ]
    //    (key1[1])[
    //                 dt=>'...', 
    //                 main[temp=>'...', ~temp_kf=>'...'], 
    //                 weather[id=>'...'~],
    //                 clouds[''],
    //                 wind[''],
    //                 visibility=>'',
    //                 pop=>'',
    //                 sys[''],
    //                 dt_txt=>'',
    //             ]
    //          ];
            

    // htmlの引数を配列ではなく、文字列にする必要がある
    // 配列の指定(うまく取り出す)ができればOK?
    //  controllerにforeach用の関数を作成してそれをbladeで@foreachで回す？
    
    // APIデータ確認用
    public function weatherDataa() {
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
        // $weather_data = array_column($weather_data['list']);
        // $weather_data = $weather_data['list'];

        return response()->json($weather_data['list']);
    }
}

