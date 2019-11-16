@extends('layouts.master')
{{-- layouts폴더내에 master.blade.php --}}

@section('content')
<p>여는 자식 블레이드 파일의 콘텐츠부분임!</p>
@endsection

@section('foot')
<p> 코끼리다리, 벽, 노?</p>
@include('partials.footer')
@stop

@section('script')
  @parent
  <script>
    alert('layouttest.blade.php의 script섹션!')
  </script>
@stop