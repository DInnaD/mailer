<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('subscribers', function (Blueprint $table) {
            
            $table->increments('id_subscriber');            
            $table->string('firstname_subscriber')->nullable();
            $table->string('lastname_subscriber')->nullable();
            $table->string('email_subscriber')->nullable()->unique();
            
            
            //For Data
            $table->integer('report_id')->nullable()->unsigned();
            $table->foreign('report_id')->references('id_report')->on('reports');
            // $table->boolean('viewed_subscriber')->default(false);
            // $table->boolean('unsubscriber_subscriber')->default(false);
            // $table->string('because_subscriber')->nullable();
            
            $table->timestamps();
            
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->created_by = Auth::user()->name;

            // For Route
            $table->integer('bunch_id')->nullable()->unsigned();
            $table->foreign('bunch_id')->references('id_bunch')->on('bunchs');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
        
    }
}
