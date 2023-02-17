<!DOCTYPE html>
<html lang="ja">
 
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  @vite('resources/js/app.js')
  <title>天気情報</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
 
<body>
  <div class="container">
    @yield('content')
    <form action="/search" method="get">
      <span>〒<input type="text" name="zip1" style="width: 35px; height: 25px; padding: 0;"></span>
      <span>- <input type="text" name="zip2" style="width: 45px; height: 25px; padding: 0;"></span>
      <input type="submit" name="submit" value="検索" style="width: 40px; height: 20px; font-size: 15px;">
    </form>
  </div>

  <!-- 予報結果 -->
  <div class="result">
    @if($weather_data)
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>日付</th>
            <th>天気</th>
            <th>気温</th>
          </tr>
        </thead>
        @foreach($weather_data['list'] as $wd)
          @foreach($wd['weather'] as $wt)
            <tr>
              <td>{{\Carbon\Carbon::createFromTimeString($wd['dt_txt'])->format('n/d G:i')}}</td>
              <td>{{$wt['description']}}</td>
              <td>{{round($wd['main']['temp'])}}℃</td>
            </tr>
          @endforeach  
        @endforeach
      </table>
    @else
      郵便番号をご入力ください  
    @endif
  </div>
  <!-- <?php
  echo date('n月j日 G時');
  ?> -->
</body>

</html>
