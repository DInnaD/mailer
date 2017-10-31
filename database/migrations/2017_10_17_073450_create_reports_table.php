<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id_report'); 
            
        // For Data
        
        // subject
        $table->string('subject')->nullable();
        // from
        $table->string('email')->nullable();
        // to
        $table->string('to')->nullable();
        // message
        $table->string('message')->nullable();
        // sent
        $table->boolean('sent')->default(false);//+count true to %
        // viewed
        $table->boolean('viewed')->default(false);//+count to %
        // unsubscriber
        $table->boolean('unsubscriber')->default(false);//+count to %
        // because
        $table->string('because')->nullable();
        // failed
        $table->boolean('failed')->default(false);//count false to %
        
        $table->timestamps();
        
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
        Schema::dropIfExists('reports');
    }
}
