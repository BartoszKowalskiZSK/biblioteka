<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authors', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('surname');
        });


        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('ISBN')->unique();
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->integer('amount');
            $table->timestamp('added')->nullable();
            $table->timestamps();
        });

        Schema::create('rents', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->timestamp('rent');
            $table->timestamp('due');
            $table->boolean('completed');
            $table->boolean('returned');
        });
        
        Schema::create('messages', function(Blueprint $table){
            $table->id();
            $table->string('topic');
            $table->text('description');
            $table->string('email');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('time');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('rents');
        Schema::dropIfExists('books');
        Schema::dropIfExists('authors');
    }
};