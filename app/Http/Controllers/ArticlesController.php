<?php

namespace App\Http\Controllers;
//package App.Http.Controllers; =JAVA

use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;
//use == import

class ArticlesController extends Controller
{
  public function index()
  {
    //$articles = \App\Article::get();
    //$articles = \App\Article::with('user')->get();
    //eager load
    //$articles->load('user'); 
    //lazy load
    $articles = \App\Article::latest()->paginate(3);

    return view('articles.index', compact('articles'));
  }

  public function create()
  {
    return view('articles.create');
  }

  /* public function store(Request $request)
  {
    $rules = [
      'title' => ['required'],
      'content' => ['required', 'min:10'],
    ];

    $messages = [
      'title.required' => '제목은 필수 입력 항목입니다.',
      'content.required' => '본문은 필수 입력 항목입니다.',
      'content.min' => '본문의 최소 :min 글자 이상이 필요합니다.'
    ];

    $validator = \Validator::make($request->all(), $rules, $messages);

    
    
    if($validator->fails()){
      return back()->withErrors($validator)->withInput();
    } 

    $article = \App\User::find(1)->articles()->create($request->all());

    if(!$article){
      return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
    }

    return redirect(route('articles.index'))->with('flash_messgae', '작성하신 글이 저장되었습니다.');
  }*/
  /* public function store(Request $request)
  {
    //트레이트의 메서드 이용
    $rules = [
      'title' => ['required'],
      'content' => ['required', 'min:10'],
    ];

    $messages = [
      'title.required' => '제목은 필수 입력 항목입니다.',
      'content.required' => '본문은 필수 입력 항목입니다.',
      'content.min' => '본문의 최소 :min 글자 이상이 필요합니다.'
    ];

    $this->validate($request, $rules, $messages);
    //Controller클래스에서
    // Illuminate\Foundation\Validation\ValidatesRequests 트레이트
    $article = \App\User::find(1)->articles()->create($request->all());

    if(!$article){
      return back()
      ->with('flash_message', '글이 저장되지 않았습니다.')
      ->withInput();
    }
    return redirect(route('articles.index'))->with('flash_messgae', '작성하신 글이 저장되었습니다.');
  } */

  //public function store(\App\Http\Requests\ArticlesRequest $request)
/*   public function store(ArticlesRequest $request)
  {
    //폼 리퀘스트 클래스 이용
    $article = \App\User::find(1)->articles()->create($request->all());

    if(!$article){
      return back()
      ->with('flash_message', '글이 저장되지 않았습니다.')
      ->withInput();
    }

    return redirect(route('articles.index'))
    ->with('flash_messgae', '작성하신 글이 저장되었습니다.');

  } */

  public function store(\App\Http\Requests\ArticlesRequest $request)
  {
    
    $article = \App\User::find(1)->articles()->create($request->all());

    if(!$article){
      return back()
      ->with('flash_message', '글이 저장되지 않았습니다.')
      ->withInput();
    }

    //dump('이벤트를 던집니다.');
    //event('article.created', [$article]);
    // event(인자1, 인자2)
    // 인자1의 이벤트명, 인자2의 이벤트 데이터를 가지고
    // 이벤트를 fire하는 함수이다
    // event(new \App\Events\ArticleCreated($article));
    event(new \App\Events\ArticlesEvent($article));
    //dump('이벤트를 던졌습니다.');

    return redirect(route('articles.index'))
    ->with('flash_messgae', '작성하신 글이 저장되었습니다.');

  }

  public function show($id)
  {
    // echo $foo;
    // return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 조회합니다. : ' . $id;
    $article = \App\Article::findOrFail($id);
    debug($article->toArray());


    //$article = \App\Article::latest()->paginate(3);
    
    //return $article->toArray();
    // Illuminate\Database\Eloquent\ModelNotFoundException예외발생가능성
    // dd($article);
    // return $article->toArray();
    //dd(view('articles.index', compact('articles'))->render());
    return view('articles.index', compact('articles'));
    
  }
}