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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
            $table->string('title', 255);
            $table->text('description');
            $table->year('release_years');
            $table->integer('rental_duration');
            $table->decimal('rental_rate', 8, 2);
            $table->integer('length');
            $table->decimal('replacement_cost', 8, 2);
            $table->string('rating', 255);
            $table->text('special_features');
            // $table->tsVector('fulltext'); // Note: This is just a placeholder, adjust according to your needs
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
