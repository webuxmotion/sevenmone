<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryDescriptionSeeder extends Seeder
{
    public function run()
    {
        $languages = DB::table('languages')->get();
        $categories = DB::table('categories')->get();

        $contentTemplates = [
            'uk' => '<p>Це український опис категорії ":title". Тут можна додати більше інформації.</p>',
            'en' => '<p>This is the English description for category ":title". More info can be added here.</p>',
            'pl' => '<p>To jest polski opis kategorii ":title". Tutaj można dodać więcej informacji.</p>',
            'de' => '<p>Dies ist die deutsche Beschreibung der Kategorie ":title". Hier können weitere Informationen hinzugefügt werden.</p>',
            // Додавай інші мови за потребою
        ];

        $data = [];

        foreach ($categories as $category) {
            foreach ($languages as $language) {
                $title = ucfirst($category->slug); // Можна замінити логіку для перекладів

                $content = $contentTemplates[$language->code] ?? '';
                if ($content) {
                    $content = str_replace(':title', $title, $content);
                }

                $data[] = [
                    'category_id' => $category->id,
                    'language_id' => $language->id,
                    'title' => $title,
                    'description' => null,
                    'keywords' => null,
                    'content' => $content,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('category_descriptions')->insert($data);
    }
}
