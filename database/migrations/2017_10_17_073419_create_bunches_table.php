<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBunchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bunches', function (Blueprint $table) {
            $table->increments('id_bunch');
            $table->integer('user_id')->nullable()->unsigned();

            $table->string('name_bunch')->nullable();
            $table->integer('subscriber_id')->nullable()->unsigned();//id 
            $table->string('description_bunch')->nullable();
            
            $table->timestamps();
            
            $table->foreign('subscriber_id')->references('id_subscriber')->on('subscribers');
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
        Schema::dropIfExists('bunches');
    }
}
