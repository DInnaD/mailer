<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTableSecond extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('reports', function (Blueprint $table) {
        $table->increments('id_report');    
       
        $table->integer('compaign_id')->nullable()->unsigned();
        $table->foreign('compaign_id')->references('id_compaign')->on('compaigns');
        $table->integer('subscriber_id')->nullable()->unsigned();
        $table->foreign('subscriber_id')->references('id_subscriber')->on('subscribers');
        $table->timestamps();//->nullable();

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
