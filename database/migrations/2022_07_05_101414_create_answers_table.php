<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id',true);
            $table->longText('answer');
            $table->integer('user_id')->unsigned();
            $table->integer('questions_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('answers', function ($table) {
            $table
            ->foreign('user_id')
            ->references('id')
            ->on('users');

            $table
            ->foreign('questions_id')
            ->references('id')
            ->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
