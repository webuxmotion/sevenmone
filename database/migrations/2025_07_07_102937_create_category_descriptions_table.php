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
        Schema::create('category_descriptions', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('language_id');

            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('keywords', 255)->nullable();
            $table->text('content')->nullable();

            $table->timestamps(); // optional, but useful

            $table->primary(['category_id', 'language_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_descriptions');
    }
};
