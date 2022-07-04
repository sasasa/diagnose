<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>キャンペーンタイトル</title>
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
  <header>
    <h1>キャンペーンタイトル</h1>
  </header>
  <main>
    {{ $slot }}
  </main>
  <script>

  </script>
  <footer>
    ©XXXXXXXX
  </footer>
</body>
</html>