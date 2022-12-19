<?php

namespace App\Modules\web\Categories\database\seeders;

use App\Modules\web\Categories\Models\Category;
use App\Modules\web\Categories\Models\CategoryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDOException;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            //1
            [
                'parent_id' => null,
                'unique_name' => 'root'
            ],
            //2
            [
                'parent_id' => 1,
                'unique_name' => Str::slug('sportwears'),
                'translation' => [
                    [
                        'category_id' => 2,
                        'name' => 'Sportwears',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            //3
            [
                'parent_id' => 2,
                'unique_name' => 'nike',
                'translation' => [
                    [
                        'category_id' => 3,
                        'name' => 'Nike',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            //4
            [
                'parent_id' => 2,
                'unique_name' => Str::slug('Under Armour'),
                'translation' => [
                    [
                        'category_id' => 4,
                        'name' => 'Under Armour',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            //5
            [
                'parent_id' => 2,
                'unique_name' => Str::slug('Adidas'),
                'translation' => [
                    [
                        'category_id' => 5,
                        'name' => 'Adidas',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            //6
            [
                'parent_id' => 2,
                'unique_name' => Str::slug('Puma'),
                'translation' => [
                    [
                        'category_id' => 6,
                        'name' => 'Puma',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            // 7
            [
                'parent_id' => 2,
                'unique_name' => Str::slug('Asics'),
                'translation' => [
                    [
                        'category_id' => 7,
                        'name' => 'Asics',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            // 8
            [
                'parent_id' => 1,
                'unique_name' => Str::slug('Mens'),
                'translation' => [
                    [
                        'category_id' => 8,
                        'name' => 'Mens',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            // 9
            [
                'parent_id' => 8,
                'unique_name' => Str::slug('Fendi'),
                'translation' => [
                    [
                        'category_id' => 8,
                        'name' => 'Fendi',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            //10
            [
                'parent_id' => 8,
                'unique_name' => Str::slug('Guess'),
                'translation' => [
                    [
                        'category_id' => 10,
                        'name' => 'Guess',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            //11
            [
                'parent_id' => 8,
                'unique_name' => Str::slug('Valentino'),
                'translation' => [
                    [
                        'category_id' => 11,
                        'name' => 'Valentino',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            // 12
            [
                'parent_id' => 1,
                'unique_name' => Str::slug('Womens'),
                'translation' => [
                    [
                        'category_id' => 12,
                        'name' => 'Womens',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            // 13
            [
                'parent_id' => 12,
                'unique_name' => Str::slug('Fendi Women'),
                'translation' => [
                    [
                        'category_id' => 13,
                        'name' => 'Fendi',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            //14
            [
                'parent_id' => 12,
                'unique_name' => Str::slug('Guess Women'),
                'translation' => [
                    [
                        'category_id' => 14,
                        'name' => 'Guess',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            // 15
            [
                'parent_id' => 12,
                'unique_name' => Str::slug('Valentino Women'),
                'translation' => [
                    [
                        'category_id' => 15,
                        'name' => 'Valentino',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            // 16
            [
                'parent_id' => 12,
                'unique_name' => Str::slug('Dior Women'),
                'translation' => [
                    [
                        'category_id' => 16,
                        'name' => 'Dior',
                        'lang_code' => 'en'
                    ]
                ]
            ],
            // 17
            [
                'parent_id' => 1,
                'unique_name' => Str::slug('Kids'),
                'translation' => [
                    [
                        'category_id' => 17,
                        'name' => 'Kids',
                        'lang_code' => 'en'
                    ]
                ]
            ],
        ];

        DB::transaction(function () use ($categories) {
            foreach ($categories as $category) {
                $translation = null;

                if (isset($category['translation'])) {
                    $translation = array_pop($category);
                }

                $model = Category::query()->create($category);

                if ($translation) {
                    // dd($translation, $model);
                    $translation[0]['category_id'] = $model->id;
                    // $childModel = new CategoryTranslation($category['translation'][0]);
                    $model->translations()->create($translation[0]);
                }
            }
        });
    }
}
