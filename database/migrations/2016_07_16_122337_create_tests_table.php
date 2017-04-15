<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->string('title');
          $table->string('reference_name');
          $table->string('reference_url');
          $table->string('poster');
          $table->boolean('published')->default(false);
          $table->timestamps();

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
        Schema::drop('tests');
    }
}
