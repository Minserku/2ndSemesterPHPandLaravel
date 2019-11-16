<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @yield('content')
  <!-- <-- 현재 레이아웃 파일을 확장하는 블레이드 파일에 양보함 -->
  @yield('foot')
  @yield('script')
</body>
</html>