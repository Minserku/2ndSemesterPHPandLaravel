<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>테스트 페이지임. 이제 라우팅 다한 거나 다름 없음!</h1>
  <h2>
    <?=isset($greeting)?"{$greeting}":"HELLO"; ?>
    <?= $name?>
  </h2>
    @if($itemCount= count($items))
        <p> {{$itemCount}} 종류의 과일 판매중</p>
    @else
        <p> 재고 없음 </p>
    @endif

    @foreach($items as $item)
      <li>{{ $item }}</li>
    @endforeach

    @forelse($items as $item)
      <li><a href="http://127.0.0.1:8000/{{$item}}">{{$item}}</a></li>
    @empty
      <p>읍다</p>
    @endforelse
</body>
</html>