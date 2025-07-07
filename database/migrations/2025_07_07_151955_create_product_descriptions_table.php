<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_descriptions', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('language_id');
            $table->string('title', 255);
            $table->text('content');
            $table->string('exerpt', 255);
            $table->string('keywords', 255)->nullable();
            $table->string('description', 255)->nullable();

            $table->primary(['product_id', 'language_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_descriptions');
    }
};
