<?php

use Illuminate\Database\Seeder;
use App\Models\Answer;
class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer = new Answer([
            'question_id' => 1,
            'status' => 0,
            'value' => 'へ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 1,
            'status' => 1,
            'value' => 'て'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 1,
            'status' => 0,
            'value' => 'で'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 1,
            'status' => 0,
            'value' => 'よ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 1,
            'status' => 1,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 1,
            'status' => 0,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 2,
            'status' => 0,
            'value' => 'へ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 2,
            'status' => 0,
            'value' => 'て'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 2,
            'status' => 0,
            'value' => 'で'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 2,
            'status' => 0,
            'value' => 'よ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 2,
            'status' => 0,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 2,
            'status' => 1,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 3,
            'status' => 0,
            'value' => 'へ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 3,
            'status' => 1,
            'value' => 'て'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 3,
            'status' => 0,
            'value' => 'で'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 3,
            'status' => 0,
            'value' => 'よ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 3,
            'status' => 1,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 3,
            'status' => 0,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 4,
            'status' => 0,
            'value' => 'へ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 4,
            'status' => 0,
            'value' => 'て'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 4,
            'status' => 0,
            'value' => 'で'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 4,
            'status' => 0,
            'value' => 'よ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 4,
            'status' => 0,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 4,
            'status' => 1,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 5,
            'status' => 0,
            'value' => 'へ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 5,
            'status' => 1,
            'value' => 'て'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 5,
            'status' => 0,
            'value' => 'で'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 5,
            'status' => 0,
            'value' => 'よ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 5,
            'status' => 1,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 5,
            'status' => 0,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 6,
            'status' => 0,
            'value' => 'へ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 6,
            'status' => 1,
            'value' => 'て'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 6,
            'status' => 0,
            'value' => 'で'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 7,
            'status' => 0,
            'value' => 'よ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 7,
            'status' => 1,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 8,
            'status' => 0,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 8,
            'status' => 0,
            'value' => 'て'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 8,
            'status' => 1,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 8,
            'status' => 1,
            'value' => 'へ'
            ]);
        $answer->save();

        //Test 2 questions

        $answer = new Answer([
            'question_id' => 9,
            'status' => 1,
            'value' => 'て'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 9,
            'status' => 0,
            'value' => 'で'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 9,
            'status' => 1,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 9,
            'status' => 0,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 10,
            'status' => 0,
            'value' => 'へ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 10,
            'status' => 0,
            'value' => 'で'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 10,
            'status' => 0,
            'value' => 'よ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 10,
            'status' => 1,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 11,
            'status' => 1,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 11,
            'status' => 0,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 12,
            'status' => 0,
            'value' => 'で'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 12,
            'status' => 0,
            'value' => 'よ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 12,
            'status' => 0,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 12,
            'status' => 1,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 13,
            'status' => 0,
            'value' => 'へ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 13,
            'status' => 0,
            'value' => 'よ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 13,
            'status' => 1,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 13,
            'status' => 0,
            'value' => 'や'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 14,
            'status' => 0,
            'value' => 'へ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 14,
            'status' => 1,
            'value' => 'て'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 15,
            'status' => 0,
            'value' => 'よ'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 15,
            'status' => 1,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 16,
            'status' => 1,
            'value' => 'に'
            ]);
        $answer->save();

        $answer = new Answer([
            'question_id' => 16,
            'status' => 1,
            'value' => 'へ'
            ]);
        $answer->save();

    }
}
