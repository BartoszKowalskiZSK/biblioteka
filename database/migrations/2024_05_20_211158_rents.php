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
        Schema::create('rents', function (Blueprint $table){
            $table->increments('id');
            $table->int('user_id')->unsigned();
            $table->int('book_id')->unsigned();
            $table->timestamp('rent');
            $table->timestamp('due');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('book_id')
                ->references('id')
                ->on('books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
