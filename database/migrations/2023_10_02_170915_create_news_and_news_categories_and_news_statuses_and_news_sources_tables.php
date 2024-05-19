<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news_statuses', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('news_categories', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->timestamps();
        });
        Schema::create('news', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->string('image');
            $table->text('description');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('status_id')->references('id')->on('news_statuses');
            $table->foreign('category_id')->references('id')->on('news_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
        Schema::dropIfExists('news_categories');
        Schema::dropIfExists('news_statuses');
    }
};
