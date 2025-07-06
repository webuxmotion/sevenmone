<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id'); // unsigned int, auto-increment, primary key
            $table->unsignedInteger('parent_id');
            $table->string('slug', 255)->nullable()->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });

        // Add index on first 191 characters of slug
        DB::statement('ALTER TABLE categories ADD INDEX slug_index (slug(191));');
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
