<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('languages')->insert([
            [
                'code' => 'uk',
                'title' => 'Українська',
                'base' => 1, // базова мова
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'en',
                'title' => 'English',
                'base' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'pl',
                'title' => 'Polski',
                'base' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'de',
                'title' => 'Deutsch',
                'base' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
