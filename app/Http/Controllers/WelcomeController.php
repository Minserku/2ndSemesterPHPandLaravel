<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    public function index()
    {
        //return view('welcome');
        return __METHOD__ . '조회 기능 구현';
        // __METHOD__:매직상수 자신을 포함한 메서드 이름을 담고 있는 매직 상수.
    }

    public function create()
    {
      return __METHOD__ . '생성 기능 구현';
    }

   
    public function store(Request $request)
    {
       return __METHOD__ . '저장 기능 구현';
    }

    
    public function show($id)
    {
      return __METHOD__ . "{$id}번 째 데이터 조회 기능 구현";
    }

   
    public function edit($id)
    {
      return __METHOD__ . "{$id}번 째 데이터 수정 기능 구현";
    }

   
    public function update(Request $request, $id)
    {
      return __METHOD__ . "{$id}번 쨰 데이터 업데이트 기능 구현";
    }

    
    public function destroy($id)
    {
      return __METHOD__ . "{$id}번 째 데이터 삭제 기능 구현";
    }
}
