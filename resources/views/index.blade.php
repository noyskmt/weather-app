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
    <!-- メソッドにデーターを送信？ -->
    <form action="" method="get">
      <span>〒<input type="text" name="post_code" minlength="7" maxlength="8"  style="width: 80px; height: 25px; padding: 0;"></span>
      <input type="submit" name="submit" value="検索" style="width: 40px; height: 20px; font-size: 15px;">
    </form>
  </div>

  <!-- 予報結果 -->
  <div class="result">
    @if($weather_data === true)
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>日付</th>
            <th>天気</th>
            <th>気温</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>mdo</td>
          </tr>
          <tr>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>fat</td>
          </tr>
          <tr>
            <td>Larry the Bird</td>
            <td>hoge</td>
           <td>twitter</td>
         </tr>
        </tbody>
      </table>
    @else
      郵便番号をご入力ください
    @endif
  </div>
</body>

</html>
