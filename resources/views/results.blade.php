<!DOCTYPE html>
<html lang="ja">
 
<head>
    <title>お天気検索！</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
 
<body>
    <div class="container">
      @yield('content')
    </div>
    <h1>郵便番号検索</h1>
  <form>
    <label>
      <span>〒</span>
      <input type="text" name="postal_code" minlength="7" maxlength="8" pattern="\d*" autocomplete="shipping postal-code">
      <input type="submit" name="submit" value="検索">
    </label>
  </form>
</body>

</html>
