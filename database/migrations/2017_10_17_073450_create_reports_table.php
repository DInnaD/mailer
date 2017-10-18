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
         
            $table->integer('compaign_id')->nullable()->unsigned();
            $table->integer('subscriber_id')->nullable()->unsigned();
            //$table->integer('user_id')->nullable()->unsigned();
            
            $table->timestamps();//->nullable();
            
           
            $table->foreign('compaign_id')->references('id_compaign')->on('compaigns');
            $table->foreign('subscriber_id')->references('id_subscriber')->on('subscribers');
            //$table->foreign('user_id')->references('id')->on('users');
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
