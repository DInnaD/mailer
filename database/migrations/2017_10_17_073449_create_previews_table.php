<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previews', function (Blueprint $table) {                
        $table->increments('id_preview');
        //For Data
        $table->integer('compaign_id')->nullable()->unsigned();
        $table->foreign('compaign_id')->references('id_compaign')->on('compaigns');
        //$table->string('name_compaign')->nullable();

        $table->string('from')->nullable()->unique();

        $table->integer('subscriber_id')->nullable()->unsigned();
        $table->foreign('subscriber_id')->references('id_subscriber')->on('subscribers');
        //$table->string('email_subscriber')->nullable();

        $table->integer('template_id')->nullable()->unsigned();
        $table->foreign('template_id')->references('id_template')->on('templates');
        //$table->string('content_template')->nullable();

        $table->boolean('survey')->default(false);
        
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
        Schema::dropIfExists('previews');
    }
}
