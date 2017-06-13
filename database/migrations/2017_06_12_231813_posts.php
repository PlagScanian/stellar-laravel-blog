<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // blog table
        Schema::create('posts', function(Blueprint $table)
        {
          $table->increments('id');
          $table->integer('user_id')->unsigned()->default(0);
          $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
          $table->boolean('active');
          $table->string('title')->unique();
          $table->text('body');
          $table->dateTime('published_at')->nullable();
          $table->dateTime('deleted_at')->nullable();
          $table->string('slug')->unique();
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
        // drop blog table
        Schema::drop('posts');
    }
}