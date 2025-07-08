<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryDescription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Створюємо категорії
        $categories = [
            ['id' => 1, 'parent_id' => 0, 'slug' => 'computers'],
            ['id' => 2, 'parent_id' => 0, 'slug' => 'tablets'],
            ['id' => 3, 'parent_id' => 0, 'slug' => 'laptops'],
            ['id' => 4, 'parent_id' => 3, 'slug' => 'mac'],
            ['id' => 5, 'parent_id' => 3, 'slug' => 'windows'],
            ['id' => 6, 'parent_id' => 0, 'slug' => 'phones'],
            ['id' => 7, 'parent_id' => 0, 'slug' => 'cameras'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Переклади назв і контенту
        $translations = [
            'computers' => [
                'uk' => 'Комп’ютери',
                'en' => 'Computers',
                'pl' => 'Komputery',
                'de' => 'Computer',
            ],
            'tablets' => [
                'uk' => 'Планшети',
                'en' => 'Tablets',
                'pl' => 'Tablety',
                'de' => 'Tablets',
            ],
            'laptops' => [
                'uk' => 'Ноутбуки',
                'en' => 'Laptops',
                'pl' => 'Laptopy',
                'de' => 'Laptops',
            ],
            'mac' => [
                'uk' => 'Mac',
                'en' => 'Mac',
                'pl' => 'Mac',
                'de' => 'Mac',
            ],
            'windows' => [
                'uk' => 'Windows',
                'en' => 'Windows',
                'pl' => 'Windows',
                'de' => 'Windows',
            ],
            'phones' => [
                'uk' => 'Телефони',
                'en' => 'Phones',
                'pl' => 'Telefony',
                'de' => 'Telefone',
            ],
            'cameras' => [
                'uk' => 'Камери',
                'en' => 'Cameras',
                'pl' => 'Aparaty',
                'de' => 'Kameras',
            ],
        ];

        $contentTemplates = [
            'uk' => '<p>Це український опис категорії ":title". Тут можна додати більше інформації.</p>',
            'en' => '<p>This is the English description for category ":title". More info can be added here.</p>',
            'pl' => '<p>To jest polski opis kategorii ":title". Tutaj można dodać więcej informacji.</p>',
            'de' => '<p>Dies ist die deutsche Beschreibung der Kategorie ":title". Hier können weitere Informationen hinzugefügt werden.</p>',
        ];

        $languages = DB::table('languages')->get();
        $categoriesFromDb = Category::all();

        foreach ($categoriesFromDb as $category) {
            $slug = $category->slug;

            foreach ($languages as $language) {
                $code = $language->code;
                $title = $translations[$slug][$code] ?? ucfirst($slug);

                $content = $contentTemplates[$code] ?? '';
                $content = str_replace(':title', $title, $content);

                CategoryDescription::create([
                    'category_id' => $category->id,
                    'language_id' => $language->id,
                    'title' => $title,
                    'description' => null,
                    'keywords' => null,
                    'content' => $content,
                ]);
            }
        }
    }
}
