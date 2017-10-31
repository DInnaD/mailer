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
        Schema::create('bunches', function (Blueprint $table) {

            $table->increments('id_bunch');
            $table->string('name_bunch')->nullable();            
            $table->longText('description_bunch')->nullable();
                        
            $table->timestamps();
            //For Data
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->created_by = Auth::user()->name;
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Scema::dropforeign(['subscriber_id']);//ce virno?
        Schema::dropIfExists('bunches');
    }
}
