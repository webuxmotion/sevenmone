<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); // unsigned int, auto-increment, primary key
            $table->unsignedInteger('category_id');
            $table->string('slug', 255);
            $table->decimal('price', 10, 2);      // Ціна
            $table->decimal('old_price', 10, 2)->default(0); // Стара ціна, якщо є
            $table->boolean('status')->default(true);        // Статус продукту (1 - активний)
            $table->boolean('hit')->default(false);          // Хіт продажів (1 - так)
            $table->string('img', 255)->nullable();          // Шлях до зображення
            $table->boolean('is_download')->default(false);  // Чи є завантажуваним продуктом
            $table->timestamps();

            // Зовнішній ключ на categories.id (опціонально)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Індекси
            $table->index('category_id');
            $table->index('slug');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
