<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  //테이블명바꿔서(관례를 벗어나서) 생성
  //==> 모델 소스파일에서 protected $table = 'users';
  public $timestamps = false;
  //create_at, updated_at 필드를 사용하지않게 설정
  protected $fillable = ['email', 'password'];
}

?>