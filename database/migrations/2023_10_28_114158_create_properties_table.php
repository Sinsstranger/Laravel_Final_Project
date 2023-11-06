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
            // $table->foreignId('category_id')
            //     ->constrained('categories')
            //     ->nullable();
            $table->integer('category_id')->nullable();
            $table->text('description');
            $table->decimal('price_per_day', 9, 2);
            $table->foreignId('address_id')
                ->constrained('addresses')
                ->nullable();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->boolean('is_temporary_registration_possible')->default(0);
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
