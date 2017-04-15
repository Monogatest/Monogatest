<?php

use Illuminate\Database\Seeder;
use App\Models\Test;
class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = new Test([
            'user_id' => 1,
            'title' => '動物との楽しいです',
            'reference_name' => 'トリップアドバイザー',
            'reference_url' => 'https://www.tripadvisor.jp/',
            'poster' => 'http://dinolingo.com/blog/wp-content/uploads/2014/10/momotaro_10.jpg',
            'published' => true
          ]);
        $test->save();
        $test = new Test([
            'user_id' => 1,
            'title' => 'わらしべ長者',
            'reference_name' => 'トリップアドバイザー',
            'reference_url' => 'https://www.tripadvisor.jp/',
            'poster' => 'http://web-japan.org/kidsweb/folk/warashibe/images/choja.gif',
            'published' => true
          ]);
        $test->save();



    }
}
