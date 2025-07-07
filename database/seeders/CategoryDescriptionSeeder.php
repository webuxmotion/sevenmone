<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryDescriptionSeeder extends Seeder
{
    public function run()
    {
        DB::table('category_descriptions')->insert([
            // Category 1: Computers
            [
                'category_id' => 1,
                'language_id' => 2,
                'title' => 'Computers',
                'description' => 'Discover our wide selection of computers designed for performance, reliability, and style. Whether you’re a professional, a student, or just someone who loves technology, you’ll find the perfect option to fit your needs. Shop now and elevate your experience.',
                'keywords' => null,
                'content' => '<p>Discover our wide selection of computers designed for performance, reliability, and style. Whether you’re a professional, a student, or just someone who loves technology, you’ll find the perfect option to fit your needs. Shop now and elevate your experience.</p>',
            ],
            [
                'category_id' => 1,
                'language_id' => 1,
                'title' => 'Комп’ютери',
                'description' => 'Перегляньте наш великий вибір Комп’ютери — продуктивних, надійних і стильних. Підійде як для роботи, так і для навчання або розваг. Знайдіть ідеальний варіант саме для вас!',
                'keywords' => null,
                'content' => '<p>Перегляньте наш великий вибір Комп’ютери — продуктивних, надійних і стильних. Підійде як для роботи, так і для навчання або розваг. Знайдіть ідеальний варіант саме для вас!</p>',
            ],

            // Category 2: Tablets
            [
                'category_id' => 2,
                'language_id' => 2,
                'title' => 'Tablets',
                'description' => 'Discover our wide selection of tablets designed for performance, reliability, and style. Whether you’re a professional, a student, or just someone who loves technology, you’ll find the perfect option to fit your needs.',
                'keywords' => null,
                'content' => '<p>Discover our wide selection of tablets designed for performance, reliability, and style. Whether you’re a professional, a student, or just someone who loves technology, you’ll find the perfect option to fit your needs.</p>',
            ],
            [
                'category_id' => 2,
                'language_id' => 1,
                'title' => 'Планшети',
                'description' => 'Знайдіть ідеальний планшет для навчання, роботи або розваг. Висока продуктивність, зручність та сучасні функції.',
                'keywords' => null,
                'content' => '<p>Знайдіть ідеальний планшет для навчання, роботи або розваг. Висока продуктивність, зручність та сучасні функції.</p>',
            ],

            // Category 3: Notebooks
            [
                'category_id' => 3,
                'language_id' => 2,
                'title' => 'Notebooks',
                'description' => 'Our notebook selection includes powerful machines for work and compact options for travel. Built for performance and portability.',
                'keywords' => null,
                'content' => '<p>Our notebook selection includes powerful machines for work and compact options for travel. Built for performance and portability.</p>',
            ],
            [
                'category_id' => 3,
                'language_id' => 1,
                'title' => 'Ноутбуки',
                'description' => 'Ноутбуки для будь-яких потреб — від ігор до офісної роботи. Потужність, мобільність, стиль.',
                'keywords' => null,
                'content' => '<p>Ноутбуки для будь-яких потреб — від ігор до офісної роботи. Потужність, мобільність, стиль.</p>',
            ],

            // Category 4: Mac
            [
                'category_id' => 4,
                'language_id' => 2,
                'title' => 'Mac',
                'description' => 'Explore the world of Mac with sleek design, powerful features, and seamless integration across Apple devices.',
                'keywords' => null,
                'content' => '<p>Explore the world of Mac with sleek design, powerful features, and seamless integration across Apple devices.</p>',
            ],
            [
                'category_id' => 4,
                'language_id' => 1,
                'title' => 'Mac',
                'description' => 'Оцініть преміальні ноутбуки Mac — елегантність, продуктивність та надійність від Apple.',
                'keywords' => null,
                'content' => '<p>Оцініть преміальні ноутбуки Mac — елегантність, продуктивність та надійність від Apple.</p>',
            ],

            // Category 5: Windows
            [
                'category_id' => 5,
                'language_id' => 2,
                'title' => 'Windows',
                'description' => 'Versatile and compatible — our Windows laptops are perfect for everyday tasks, business, and gaming.',
                'keywords' => null,
                'content' => '<p>Versatile and compatible — our Windows laptops are perfect for everyday tasks, business, and gaming.</p>',
            ],
            [
                'category_id' => 5,
                'language_id' => 1,
                'title' => 'Windows',
                'description' => 'Ноутбуки з Windows — універсальне рішення для роботи, навчання та ігор.',
                'keywords' => null,
                'content' => '<p>Ноутбуки з Windows — універсальне рішення для роботи, навчання та ігор.</p>',
            ],

            // Category 6: Phones
            [
                'category_id' => 6,
                'language_id' => 2,
                'title' => 'Phones',
                'description' => 'Stay connected with the latest smartphones. Performance, design, and innovation in your hand.',
                'keywords' => null,
                'content' => '<p>Stay connected with the latest smartphones. Performance, design, and innovation in your hand.</p>',
            ],
            [
                'category_id' => 6,
                'language_id' => 1,
                'title' => 'Телефони',
                'description' => 'Смартфони нового покоління — висока якість зв’язку, потужність і стильний дизайн.',
                'keywords' => null,
                'content' => '<p>Смартфони нового покоління — висока якість зв’язку, потужність і стильний дизайн.</p>',
            ],

            // Category 7: Cameras
            [
                'category_id' => 7,
                'language_id' => 2,
                'title' => 'Cameras',
                'description' => 'Capture life’s moments with our wide range of digital cameras — from compact to professional DSLRs.',
                'keywords' => null,
                'content' => '<p>Capture life’s moments with our wide range of digital cameras — from compact to professional DSLRs.</p>',
            ],
            [
                'category_id' => 7,
                'language_id' => 1,
                'title' => 'Камери',
                'description' => 'Фотокамери для будь-якого рівня — від аматорських до професійних. Зберігайте найкращі миті.',
                'keywords' => null,
                'content' => '<p>Фотокамери для будь-якого рівня — від аматорських до професійних. Зберігайте найкращі миті.</p>',
            ],
        ]);
    }
}
