<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('test_user', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('test_id');
             $table->integer('user_id');
             $table->decimal('score', 5, 2);
             $table->timestamps();
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('test_user');
    }
}
