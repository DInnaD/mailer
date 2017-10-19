<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendsTableSecond extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sends', function (Blueprint $table) {

        $table->integer('template_id')->nullable()->unsigned();//id 
        $table->foreign('template_id')->references('id_template')->on('templates');
        $table->integer('compaign_id')->nullable()->unsigned();
        $table->foreign('compaign_id')->references('id_compaign')->on('compaigns');
        $table->integer('subscriber_id')->nullable()->unsigned();
        $table->foreign('subscriber_id')->references('id_subscriber')->on('subscribers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
