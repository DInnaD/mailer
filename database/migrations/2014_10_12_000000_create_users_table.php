<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

//all foring key ???

            //is_admin 
            //status--baned or not bool
            //avatar
            //created_at
            //update_at
            /////////////////
            // article()
            // author() equal owned()
            // toggleStatus()

            //subscription  : id, email=verif, token=agreement/composer/, created_at, updated_at  **add(), remove()
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
