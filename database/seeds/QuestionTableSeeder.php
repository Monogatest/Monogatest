<?php

use Illuminate\Database\Seeder;
use App\Models\Question;
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
            'page_id' => '1',
            'question_number' => '1'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '1',
            'question_number' => '2'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '1',
            'question_number' => '3'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '1',
            'question_number' => '4'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '1',
            'question_number' => '5'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '2',
            'question_number' => '6'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '2',
            'question_number' => '7'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '2',
            'question_number' => '8'
            ]);
        $question->save();



        $question = new Question([
            'page_id' => '3',
            'question_number' => '1'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '3',
            'question_number' => '2'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '3',
            'question_number' => '3'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '3',
            'question_number' => '4'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '3',
            'question_number' => '5'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '4',
            'question_number' => '6'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '4',
            'question_number' => '7'
            ]);
        $question->save();

        $question = new Question([
            'page_id' => '4',
            'question_number' => '8'
            ]);
        $question->save();
    }
}
