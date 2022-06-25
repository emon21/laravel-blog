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
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('status')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            //if you category data delete on post data delete
          // $table->foreign('category_id')->references('id')->on('categories')->OnDelete('cascade');
            // $table->foreign('category_id')->on('categories')->onDelete('cascade');
            // $table->foreign('category_id')->constrained('categories')->cascadeOnDelete();
            // $table->foreignId('category_id')->constrained()->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            //  $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
