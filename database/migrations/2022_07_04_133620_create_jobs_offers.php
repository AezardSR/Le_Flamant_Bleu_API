<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_offers', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name', 50);
            $table->date('dateOffers')->nullable();
            $table->longText('description');
            $table->string('link', 255)->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('partnerContacts_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('jobs_offers', function ($table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');

            $table
                ->foreign('partnerContacts_id')
                ->references('id')
                ->on('partner_contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_offers');
    }
}
