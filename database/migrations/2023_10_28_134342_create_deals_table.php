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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->timestamp('rent_starts_at')->nullable();
            $table->timestamp('rent_ends_at')->nullable();
            $table->decimal('rent_costs', 11, 2);
            $table->foreignId('status_id')
                ->constrained('deal_statuses');
            $table->foreignId('property_id')
                ->constrained('properties');
            $table->foreignId('rent_id')
                ->constrained('relations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
