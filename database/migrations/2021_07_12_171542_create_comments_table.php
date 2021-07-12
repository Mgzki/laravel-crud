<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('post_id')->constrained()->cascadeOnDelete(); // does the same thing as the 2 lines below
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); //when creating a foreign id, need to make sure the types are the same.
            $table->text('body');
            $table->timestamps();

            // $table->unsignedBigInteger('post_id'); //when creating a foreign id, need to make sure the types are the same.
            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete(); //when you delete the associated post, cascade and also delete the comments on that posts
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
