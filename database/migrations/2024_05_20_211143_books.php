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
        if (!Schema::hasTable('books')) {
            Schema::create('books', function (Blueprint $table): void {
                $table->id();
                $table->string('name');
                $table->text('description');
                $table->string('ISBN')->unique();
                $table->unsignedBigInteger('author_id');
                $table->integer('amount');
                $table->timestamp('added')->nullable();
                $table->timestamps();

                $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('books')) {
            Schema::dropIfExists('books');
        }
    }
};