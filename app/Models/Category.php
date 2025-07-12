<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $with = ['description'];

    public static function getAllNestedIds(int $categoryId): array
    {
        // Get all categories once
        $all = self::all(['id', 'parent_id'])->toArray();

        $result = [$categoryId];

        $stack = [$categoryId];

        while ($stack) {
            $parentId = array_pop($stack);

            foreach ($all as $category) {
                if ($category['parent_id'] === $parentId) {
                    $result[] = $category['id'];
                    $stack[] = $category['id'];
                }
            }
        }

        return array_unique($result);
    }


    public function description()
    {
        return $this->hasOne(CategoryDescription::class, foreignKey: 'category_id')
            ->where('language_id', app()->getLocaleId());
    }
}
