<?php

namespace Database\Seeders;

use App\Models\Category;
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
                'name' => 'Beslenme ve Diyet',
                'slug' => 'beslenme-ve-diyet',
                'status' => true,
                'description' => 'Sağlıklı beslenme ve diyet programları',
                'order' => 1,
            ],
            [
                'name' => 'Sağlıklı Yaşam',
                'slug' => 'saglikli-yasam',
                'status' => true,
                'description' => 'Sağlıklı yaşam önerileri ve ipuçları',
                'order' => 2,
            ],
            [
                'name' => 'Sağlıklı Tarifler',
                'slug' => 'saglikli-tarifler',
                'status' => true,
                'description' => 'Diyetisyen onaylı sağlıklı tarifler',
                'order' => 3,
            ],
            [
                'name' => 'Spor ve Beslenme',
                'slug' => 'spor-ve-beslenme',
                'status' => true,
                'description' => 'Sporcular için beslenme önerileri',
                'order' => 4,
            ],
        ];

        collect($categories)->each(fn($category) => Category::query()->create($category));
    }
}
