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
            $table->foreignId('property_id')
                ->constrained('properties')
                ->onDelete('cascade');
            $table->foreignId('tenant_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->date('rent_starts_at');
            $table->date('rent_ends_at');
            $table->decimal('rent_costs', 11, 0);
            $table->integer('guests')->nullable();
            $table->boolean('registration');
            $table->foreignId('status_id')
                ->constrained('deal_statuses')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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
