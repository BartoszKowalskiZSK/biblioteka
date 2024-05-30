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
        if (!Schema::hasTable('authors')) {
            Schema::create('authors', function (Blueprint $table): void {
                $table->id();
                $table->string('name');
                $table->string('surname');
                $table->text('biography');
                $table->timestamp('born')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('authors')) {
            Schema::dropIfExists('authors');
        }
    }
};