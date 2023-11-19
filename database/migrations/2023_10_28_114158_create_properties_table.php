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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title', 120);
            $table->foreignId('category_id')
                ->constrained('categories');
            $table->tinyInteger('number_of_rooms');
            $table->tinyInteger('number_of_guests');
            $table->text('description');
            $table->json('photo');
            $table->decimal('price_per_day', 6, 0);
            $table->foreignId('address_id')
                ->constrained('addresses')->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->boolean('is_temporary_registration_possible')->default(0);;
            $table->boolean('daily_rent')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
