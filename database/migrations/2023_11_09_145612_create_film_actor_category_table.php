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
        Schema::create('film_actor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('film_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
        Schema::create('film_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('film_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_actor');
        Schema::dropIfExists('film_category');
    }
};
