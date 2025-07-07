<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // image path
            $table->string('link')->nullable(); // optional button link
            $table->timestamps();
        });

        Schema::create('slide_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('slide_id');
            $table->unsignedInteger('language_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('button_title')->nullable();

            $table->primary(['slide_id', 'language_id']);
            $table->foreign('slide_id')->references('id')->on('slides')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slide_descriptions');
        Schema::dropIfExists('slides');
    }
};