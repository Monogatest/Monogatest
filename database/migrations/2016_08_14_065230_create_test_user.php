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
             $table->integer('test_id')->unsigned();
             $table->integer('user_id')->unsigned();
             $table->decimal('score', 5, 2);
             $table->timestamps();

             $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
