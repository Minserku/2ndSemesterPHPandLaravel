<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* 
Route::get('/', function () {
  return view('welcome');
});

Route::get('/test', function () {
  return view('test');
});

// Route::pattern('param', '[0-9a-zA-Z]{3}');
// Route::get('/{param}', function($param='디폴트값'){
//     return $param;
// });

// Route::get('/{param}', function($param='디폴트값'){
//   return $param;
// })->where('param', '[0-9a-zA-Z]{3}');

Route::get(
      '/',  // GET /
      [
        'as' => 'home',
        function(){ return 'My name is "Home" desu';}
      ]);

Route::get('/home', function(){
  return redirect(route('home'));
  //laravel의 도우미함수 redirect
}
); */

// VIEW
// Route::get('/', function(){
//   return view('errors/503'); //resource/views/errors/503.blade.ph
// });


/* // WITH() 도우미함수사용
Route::get('/',function(){
  //return view('test')->with('name', '김영진');
  return view('test')->with(['name'=>'김영진', 'greeting'=>'ㅎㅇ']);
});
 */

// Route::get('/',function(){
//   //return view('test')->with('name', '김영진');
//   return view('test')->with(['name'=>'김영진', 'greeting'=>'ㅎㅇ']);
// });

/* Route::get('/',function(){
  //return view('test')->with('name', '김영진');
  $fruits = [];
  return view('test',[
                  'name'=>'김민석',
                  'greetingh'=>'hi~',
                  'items'=>$fruits
                ]);
});

Route::get('/layouttest', function(){
  return view('layouttest');
}); */

// Route::get('/', 'WelcomeController@index');
// GET요청을 WelcomeController의 index()메소드로 위임
Route::resource('wel', 'WelcomeController');

Route::get('auth/login', function(){
  $credentials =[
    'email'=>'wdj1@yju.ac.kr',
    'password'=>'password' //본래는 암호화 필요
    //하드코딩, 로그인화면이 없어서 변수로 로그인 시도
  ];

  if(!auth()->attempt($credentials)){
    return '로그인 제대로 해라.';
  }
  //auth():도우미함수, 로그인처리 객체 반환
  //attempd():도우미메서드, 로그인시도
  //성공하면true, 실패하면false
  return redirect('protected'); 
});

Route::get('protected', ['middleware'=>'auth', function(){
  dump(session()->all());
  return '환영합니다.'.auth()->user()->name;
}]);
 
/* Route::get('protected', function(){
  dump(session()->all());
  //session():로그인사용자의 세션정보 객체반환
  //로그인한 사용자의 정보 객체를 반환
  if(!auth()->check()){
    return '누구세요??';
  }
  //check():로그인한 상태인지 여부 체크
  return '환영합니다.'.auth()->user()->name;
  //user(): 로그인한 사용자의 users테이블내용을 객체저장한것
}); */


Route::get('auth/logout', function(){
  auth()->logout();
  return '또 봐요';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home'); 


Route::resource('articles', 'ArticlesController');

// DB::listen(function ($query){
//   var_dump($query->sql);
// });

Route::get(
  'reqjson',
  function(){
    $data = ['name'=>'김영진', 'gender'=>'남'];//연관배열
 
    return response()->json($data);
  }
);

// Event::listen('article.created', function ($article){
//   var_dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
//   var_dump($article->toArray());
// });

Route::get('mail', function() {
  $article = App\Article::with('user')->find(1);

  return Mail::send(
    'emails.articles.created',
    compact('article'),
    function($message) use ($article){
      $message->to('minserku@naver.com');
      $message->subject('새 글이 등록되었습니다 -' . $article->title);
    }
  );
  /* return Mail::send(
    'emails.articles.created',
    compact('article'),
    function($message) use ($article){
      $message->from('minserku@naver.com', 'KMS');
      $message->to(['minserku@gmail.com']);
      $message->subject('새 글이 등록되었습니다 -' . $article->title);
      $message->attach(storage_path('elephant.png'));
    }
  ); */
});


Route::get('markdown', function(){
  $text =<<<EOT
#마크다운 예제 1

이 문서는 [마크다운][1]으로 썼습니다. 화면에는 HTML로 변환되어 출력됩니다.

##순서 없는 목록

- 첫 번째 항목
- 두 번째 항목[^1]

 [1]: http://daringfireball.net/projects/markdown

 [^1]: 두 번째 항목_ http://google.com
EOT;
  
  return app(ParsedownExtra::class)->text($text);
});