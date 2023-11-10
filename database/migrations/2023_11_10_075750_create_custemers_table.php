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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('store_id')->nullable()->constrained()->cascadeOnDelete();;
            $table->foreignId('address_id')->constrained()->cascadeOnDelete();
            $table->string('first_name',45);
            $table->string('last_name',45);
            $table->boolean('activebool')->default(true);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custemers');
    }
};
