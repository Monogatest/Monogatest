<?php

use Illuminate\Database\Seeder;
use App\Question;
class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new Question([
            'page_id' => '1'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '1'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '1'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '1'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '1'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '2'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '2'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '2'
            ]);
        $question->save();


    }
}

