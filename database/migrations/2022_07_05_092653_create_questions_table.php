<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id',true);
            $table->longText('question');
            $table->integer('classes_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('categories_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('questions', function ($table) {
            $table
            ->foreign('user_id')
            ->references('id')
            ->on('users');
        });

        Schema::table('questions', function ($table) {
            $table
            ->foreign('classes_id')
            ->references('id')
            ->on('classes')
            ->onDelete('cascade');
        });

        Schema::table('questions', function ($table) {
            $table
            ->foreign('categories_id')
            ->references('id')
            ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
