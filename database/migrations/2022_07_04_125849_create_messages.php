<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id',true);
            $table->longText('content');
            $table->integer('receiver_id')->unsigned();
            $table->integer('sender_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('messages', function ($table) {
            $table
                ->foreign('receiver_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


            $table
                ->foreign('sender_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
