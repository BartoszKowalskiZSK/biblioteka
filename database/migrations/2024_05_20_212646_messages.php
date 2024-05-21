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
        Schema::create('messages', function(Blueprint $table){
            $table->increments('id');
            $table->string('topic');
            $table->text('description');
            $table->string('email');
            $table->int('user_id')->unsigned()->nullable();
            $table->timestamp('time');

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};