<?php

namespace Database\Seeders;

use App\Models\MealCategory;
use Illuminate\Database\Seeder;

class MealCategorySeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'name' => 'Kahvaltılık',
                'is_popular' => true,
                'status' => true,
                'order' => 1,
            ],
            [
                'name' => 'Ana Yemekler',
                'is_popular' => true,
                'status' => true,
                'order' => 2,
            ],
            [
                'name' => 'Çorbalar',
                'is_popular' => true,
                'status' => true,
                'order' => 3,
            ],
            [
                'name' => 'Salatalar',
                'is_popular' => true,
                'status' => true,
                'order' => 4,
            ],
            [
                'name' => 'Pilavlar',
                'is_popular' => false,
                'status' => true,
                'order' => 5,
            ],
            [
                'name' => 'Makarnalar',
                'is_popular' => false,
                'status' => true,
                'order' => 6,
            ],
            [
                'name' => 'Tatlılar',
                'is_popular' => true,
                'status' => true,
                'order' => 7,
            ],
            [
                'name' => 'İçecekler',
                'is_popular' => false,
                'status' => true,
                'order' => 8,
            ],
            [
                'name' => 'Meyveler',
                'is_popular' => false,
                'status' => true,
                'order' => 9,
            ],
            [
                'name' => 'Atıştırmalıklar',
                'is_popular' => false,
                'status' => true,
                'order' => 10,
            ],
            [
                'name' => 'Ekmekler',
                'is_popular' => false,
                'status' => true,
                'order' => 11,
            ],
        ])->each(fn($category) => MealCategory::query()->create($category));
    }
}
