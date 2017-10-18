<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compaigns', function (Blueprint $table) {
            $table->increments('id_compaign');
            $table->integer('user_id')->nullable()->unsigned();

            $table->string('name_compaign')->nullable();
            $table->integer('template_id')->nullable()->unsigned();//id 
            $table->integer('bunch_id')->nullable()->unsigned();//
            $table->string('description_compaign')->nullable();
            $table->integer('status_compaign')->nullable();

            $table->timestamps();//->nullable();
        
           
            $table->foreign('template_id')->references('id_template')->on('templates');
            $table->foreign('bunch_id')->references('id_bunch')->on('bunches');
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
        Schema::dropIfExists('compaigns');
    }
}
