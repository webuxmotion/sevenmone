<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slide;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    public function run(): void
    {
        $slidesData = [
            [
                'image' => '/img/sevenmone-4x4-ugv.png',
                'link' => '/4x4-ugv',
                'translations' => [
                    'en' => [
                        'title' => '4x4 UGV',
                        'description' => 'All-terrain unmanned vehicle with 4 wheels.',
                        'button_title' => 'Explore 4x4'
                    ],
                    'uk' => [
                        'title' => '4x4 БПМ',
                        'description' => 'Безпілотний позашляховик на 4 колесах.',
                        'button_title' => 'Дивитися 4x4'
                    ],
                    'pl' => [
                        'title' => '4x4 UGV',
                        'description' => 'Bezpilotowy pojazd terenowy na 4 kołach.',
                        'button_title' => 'Zobacz 4x4'
                    ],
                    'de' => [
                        'title' => '4x4 UGV',
                        'description' => 'Unbemanntes Geländefahrzeug mit 4 Rädern.',
                        'button_title' => 'Entdecken 4x4'
                    ],
                ]
            ],
            [
                'image' => '/img/sevenmone-6x6-ugv.png',
                'link' => '/6x6-ugv',
                'translations' => [
                    'en' => [
                        'title' => '6x6 UGV',
                        'description' => 'Heavy-duty UGV with six-wheel traction.',
                        'button_title' => 'Explore 6x6'
                    ],
                    'uk' => [
                        'title' => '6x6 БПМ',
                        'description' => 'Міцний БПМ із шістьма колесами.',
                        'button_title' => 'Дивитися 6x6'
                    ],
                    'pl' => [
                        'title' => '6x6 UGV',
                        'description' => 'Wytrzymały pojazd UGV z sześcioma kołami.',
                        'button_title' => 'Zobacz 6x6'
                    ],
                    'de' => [
                        'title' => '6x6 UGV',
                        'description' => 'Robustes UGV mit sechs Rädern.',
                        'button_title' => 'Entdecken 6x6'
                    ],
                ]
            ],
            [
                'image' => '/img/sevenmone-8x8-ugv.png',
                'link' => '/8x8-ugv',
                'translations' => [
                    'en' => [
                        'title' => '8x8 UGV',
                        'description' => 'Extreme terrain vehicle with 8-wheel configuration.',
                        'button_title' => 'Explore 8x8'
                    ],
                    'uk' => [
                        'title' => '8x8 БПМ',
                        'description' => 'Позашляховик для складної місцевості з 8 колесами.',
                        'button_title' => 'Дивитися 8x8'
                    ],
                    'pl' => [
                        'title' => '8x8 UGV',
                        'description' => 'Pojazd terenowy z 8 kołami.',
                        'button_title' => 'Zobacz 8x8'
                    ],
                    'de' => [
                        'title' => '8x8 UGV',
                        'description' => 'Geländefahrzeug mit 8 Rädern.',
                        'button_title' => 'Entdecken 8x8'
                    ],
                ]
            ],
        ];

        $languages = DB::table('languages')->pluck('id', 'code'); // ['en' => 1, 'uk' => 2, ...]

        foreach ($slidesData as $slideData) {
            $slide = Slide::create([
                'image' => $slideData['image'],
                'link' => $slideData['link'],
            ]);

            foreach ($slideData['translations'] as $locale => $translation) {
                DB::table('slide_descriptions')->insert([
                    'slide_id' => $slide->id,
                    'language_id' => $languages[$locale] ?? 1,
                    'title' => $translation['title'],
                    'description' => $translation['description'],
                    'button_title' => $translation['button_title'],
                ]);
            }
        }
    }
}