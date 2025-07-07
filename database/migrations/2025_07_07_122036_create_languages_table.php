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
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id'); // UNSIGNED INT AUTO_INCREMENT PRIMARY KEY
            $table->string('code', 4); // Language code like 'en', 'uk'
            $table->string('title', 20); // Display name, e.g., 'English', 'Українська'
            $table->unsignedTinyInteger('base')->default(0); // 1 for base lang (e.g. default), 0 otherwise

            $table->timestamps(); // created_at, updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
