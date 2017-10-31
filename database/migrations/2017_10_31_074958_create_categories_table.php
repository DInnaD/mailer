<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // class CreateTagsTable extends Migration as category equal
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slag')->unique();
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->integer('parent_id')->nullable()->unsigned();
            //!!!!!!!!!$table->foreign('parent_id')->references('id')->on('parents');
            $table->tinyinteger('published')->nullable()->unsigned();
            $table->integer('created_by')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
