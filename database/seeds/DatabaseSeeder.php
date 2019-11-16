<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      if(config('database.default') !== 'sqlite'){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');//7장 참고
      }
      // Model::unguard() //mass assignment 허옹


      App\User::truncate();
      $this->call(UserTableSeeder::class);
      //truncate -> 모든 데이터 삭제
      //auto_increment 컬럼 값을 0으로 초기화
      App\User::truncate();
      $this->call(ArticlesTableSeeder::class);

      // Model::unguard() //mass assignment 불허
      if(config('database.default') !== 'sqlite'){
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
      }
      
    }
}
