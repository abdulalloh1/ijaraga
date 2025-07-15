<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name_uz' => 'Elektronika',
                'name_ru' => 'Электроника',
                'name_en' => 'Electronics',
                'slug' => 'electronics',
                'children' => [
                    [
                        'name_uz' => 'Kompyuterlar',
                        'name_ru' => 'Компьютеры',
                        'name_en' => 'Computers',
                        'slug' => 'computers',
                    ],
                    [
                        'name_uz' => 'Mobil qurilmalar',
                        'name_ru' => 'Мобильные устройства',
                        'name_en' => 'Mobile Devices',
                        'slug' => 'mobile-devices',
                    ],
                ],
            ],
            [
                'name_uz' => 'Maishiy texnika',
                'name_ru' => 'Бытовая техника',
                'name_en' => 'Home Appliances',
                'slug' => 'home-appliances',
                'children' => [
                    [
                        'name_uz' => 'Konditsionerlar',
                        'name_ru' => 'Кондиционеры',
                        'name_en' => 'Air Conditioners',
                        'slug' => 'air-conditioners',
                    ],
                    [
                        'name_uz' => 'Kir yuvish mashinalari',
                        'name_ru' => 'Стиральные машины',
                        'name_en' => 'Washing Machines',
                        'slug' => 'washing-machines',
                    ],
                ],
            ],
            [
                'name_uz' => 'Qurilish qurollari',
                'name_ru' => 'Строительные инструменты',
                'name_en' => 'Construction Tools',
                'slug' => 'construction-tools',
                'children' => [
                    [
                        'name_uz' => 'Elektrik asboblari',
                        'name_ru' => 'Электрические инструменты',
                        'name_en' => 'Electric Tools',
                        'slug' => 'electric-tools',
                    ],
                    [
                        'name_uz' => 'Qo\'lda ishlatiladigan asboblar',
                        'name_ru' => 'Ручные инструменты',
                        'name_en' => 'Hand Tools',
                        'slug' => 'hand-tools',
                    ],
                ],
            ],
            [
                'name_uz' => 'Transport vositalari',
                'name_ru' => 'Транспортные средства',
                'name_en' => 'Vehicles',
                'slug' => 'vehicles',
                'children' => [
                    [
                        'name_uz' => 'Avtomobillar',
                        'name_ru' => 'Автомобили',
                        'name_en' => 'Cars',
                        'slug' => 'cars',
                    ],
                    [
                        'name_uz' => 'Mototsikllar',
                        'name_ru' => 'Мотоциклы',
                        'name_en' => 'Motorcycles',
                        'slug' => 'motorcycles',
                    ],
                ],
            ]
        ];

        foreach ($categories as $category) {
            $parentCategory = \App\Models\Category::create([
                'name_uz' => $category['name_uz'],
                'name_ru' => $category['name_ru'],
                'name_en' => $category['name_en'],
                'slug' => $category['slug'],
            ]);

            if (isset($category['children'])) {
                foreach ($category['children'] as $child) {
                    \App\Models\Category::create([
                        'name_uz' => $child['name_uz'],
                        'name_ru' => $child['name_ru'],
                        'name_en' => $child['name_en'],
                        'slug' => $child['slug'],
                        'parent_id' => $parentCategory->id,
                    ]);
                }
            }
        }
    }
}
