<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name', 50);
            $table->string('firstname', 50);
            $table->date('birthdate')->nullable();
            $table->string('mail', 100);
            $table->string('tel', 10)->nullable();
            $table->string('password', 255);
            $table->string('address', 255)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('zipCode', 5)->nullable();
            $table->integer('roles_id')->unsigned();
            $table->integer('types_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('users', function ($table) {
            $table
                ->foreign('roles_id')
                ->references('id')
                ->on('roles');

            $table
                ->foreign('types_id')
                ->references('id')
                ->on('types');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
