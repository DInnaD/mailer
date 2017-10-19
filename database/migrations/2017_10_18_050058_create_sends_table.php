<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sends', function (Blueprint $table) {
        
            $table->increments('id_send');
            $table->integer('user_id')->nullable()->unsigned();

            //$table->string('subject_send')->nullable();
            $table->string('to_send')->nullable();
            //$table->string('from_send')->nullable();
            //$table->string('message_send')->nullable();//->unsigned() not migrate
        $table->integer('template_id')->nullable()->unsigned();//id 
        $table->foreign('template_id')->references('id_template')->on('templates');
        $table->integer('compaign_id')->nullable()->unsigned();
        $table->foreign('compaign_id')->references('id_compaign')->on('compaigns');
        $table->integer('subscriber_id')->nullable()->unsigned();
        $table->foreign('subscriber_id')->references('id_subscriber')->on('subscribers');

            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sends');
    }
}
