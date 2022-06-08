<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('status')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            //if you category data delete on post data delete
            // $table->foreign('category_id')->references('id')->on('posts')->OnDelete('cascade');
            // $table->foreign('category_id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
