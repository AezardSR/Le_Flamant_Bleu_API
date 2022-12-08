<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_contacts', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name', 50);
            $table->string('firstname', 50);
            $table->string('mail', 100)->nullable();
            $table->string('tel', 10)->nullable();
            $table->string('nameCompany', 50);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('partner_contacts', function ($table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_contacts');
    }
}
