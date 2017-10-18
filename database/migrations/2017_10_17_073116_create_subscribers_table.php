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
            $table->integer('user_id')->nullable()->unsigned();

            $table->string('firstname_subscriber')->nullable();
            $table->string('lastname_subscriber')->nullable();
            $table->string('email_subscriber')->nullable();
            $table->boolean('viewed_subscriber')->default(false);
            $table->boolean('unsubscriber_subscriber')->default(false);
            $table->integer('email_count_subscriber')->nullable()->unsigned();//->unsigned() not migrate

            $table->timestamps();
            
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
        Schema::dropIfExists('subscribers');
    }
}
