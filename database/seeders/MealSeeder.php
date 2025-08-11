<?php

namespace Database\Seeders;

use App\Enums\MealUnitEnum;
use App\Models\Meal;
use App\Models\MealCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['Yumurta', 'Kahvaltılıklar', 2, MealUnitEnum::PIECE],
            ['Beyaz Peynir', 'Süt ve Süt Ürünleri', 50, MealUnitEnum::GRAM],
            ['Domates', 'Sebze Yemekleri', 1, MealUnitEnum::PIECE],
            ['Haşlanmış Tavuk', 'Et ve Tavuk', 150, MealUnitEnum::GRAM],
            ['Mercimek Çorbası', 'Tahıllar ve Baklagiller', 1, MealUnitEnum::PORTION],
            ['Yoğurt', 'Süt ve Süt Ürünleri', 200, MealUnitEnum::GRAM],
            ['Muz', 'Meyveler', 1, MealUnitEnum::PIECE],
            ['Zeytin', 'Kahvaltılıklar', 6, MealUnitEnum::PIECE],
            ['Kuru Fasulye', 'Tahıllar ve Baklagiller', 1, MealUnitEnum::PORTION],
            ['Ayran', 'İçecekler', 1, MealUnitEnum::PORTION],
        ])->each(function ($meal) {
            [$name, $categoryName, $quantity, $unit] = $meal;

            $category = MealCategory::query()->firstWhere('name', $categoryName);
            if (!$category) return;

            Meal::query()->create([
                'name' => $name,
                'meal_category_id' => $category->id,
                'default_quantity' => $quantity,
                'unit' => $unit,
            ]);
        });
    }
}
