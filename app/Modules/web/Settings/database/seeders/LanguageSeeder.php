<?php

namespace App\Modules\web\Settings\database\seeders;

use App\Modules\web\Settings\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs = [
            ['code' => 'uz', 'locale' => 'uz-UZ', 'name' => "O'zbek"],
            ['code' => 'en', 'locale' => 'en-US', 'name' => "English"],
        ];

        foreach ($langs as $lang) {
            Language::query()->create($lang);
        }
    }
}
