<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->string('image');
            $table->text('content');
            $table->timestamps();

            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('test_pages');
    }
}
