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
            $table->string('name_compaign')->nullable();
            //For Data
            $table->integer('template_id')->nullable()->unsigned();
            $table->foreign('template_id')->references('id_template')->on('templates');
            //$table->string('name_template')->nullable();

            $table->integer('bunch_id')->nullable()->unsigned();
            $table->foreign('bunch_id')->references('id_bunch')->on('bunches');
            //$table->string('name_bunch')->nullable();

            $table->longText('description_compaign')->nullable();

            $table->integer('report_id')->nullable()->unsigned();
            $table->foreign('report_id')->references('id_report')->on('reports');
            //$table->integer('status_compaign')->nullable()->unsigned();//if sent=0 else return 1
            $table->timestamps();            
            
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->created_by = Auth::user()->name;



            // For Route
            $table->integer('preview_id')->nullable()->unsigned();
            $table->foreign('preview_id')->references('id_preview')->on('previews');
            
            
            
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
