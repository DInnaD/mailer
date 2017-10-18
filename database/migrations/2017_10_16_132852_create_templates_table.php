<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id_template');
            $table->integer('user_id')->unsigned()->nullable();

            $table->string('name_template')->nullable();
            $table->string('content_template')->nullable();
            
            $table->timestamps();
            
            
            //$table->foreign('subscriber_id')->references('id_subscriber')->on('subscribers');
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
        Schema::dropIfExists('templates');
    }
}
