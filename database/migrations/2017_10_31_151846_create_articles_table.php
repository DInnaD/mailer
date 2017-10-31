<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slag')->unique();//seo link 
            $table->integer('user_id')->nullable()->unsigned();//author
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->text('description_short')->nullable();
            $table->text('description')->nullable();

            $table->string('image')->nullable();
            $table->boolean('image_show')->default(true);

            
            $table->string('mete_title')->nullable();
            $table->text('mete_description')->nullable();
            $table->text('mete_keyword')->nullable();

            $table->string('view')->nullable();//prosmotreno
            $table->boolean('published');

            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('modified_by')->nullable()->unsigned();
            //$table->boolean('is_fitured')->default(false);//recomend
 //$table->integer('image')->nullable()->unsigned();           
//$table->integer('status')->nullable()->unsigned();//chernovik or published
            //category_id, but polimorfno manyToMany
            // comments()//--comment--
            // tags()//--tag
            // category()
            // +user()//--podpiska
            //post_tags

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
        Schema::dropIfExists('articles');
    }
}
