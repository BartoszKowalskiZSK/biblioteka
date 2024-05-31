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
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });


        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('ISBN')->unique();
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->timestamp('added')->nullable();
            $table->timestamps();
        });

        Schema::create('rents', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id'); // Ensure this is unsignedBigInteger
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->timestamp('rent');
            $table->timestamp('due');
            $table->boolean('completed');
            $table->boolean('returned');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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

        Schema::create('info', function (Blueprint $table) {
            $table->id();
            $table->string('nrtel')->nullable();
            $table->string('email')->nullable();
            $table->string('adres')->nullable();
            $table->string('otwarcienormal')->nullable();
            $table->string('otwarcieweekend')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
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
        Schema::dropIfExists('info');
    }
};