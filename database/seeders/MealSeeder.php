<?php

namespace Database\Seeders;

use App\Enums\MealUnitEnum;
use App\Models\MealCategory;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    public function run(): void
    {
        $meals = collect([
            'Kahvaltılık' => [
                ['name' => 'Beyaz Peynir', 'default_quantity' => 50, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Kaşar Peyniri', 'default_quantity' => 40, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Yumurta', 'default_quantity' => 2, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Menemen', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Zeytin', 'default_quantity' => 10, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Domates', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Salatalık', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Bal', 'default_quantity' => 1, 'unit' => MealUnitEnum::SPOON],
                ['name' => 'Reçel', 'default_quantity' => 1, 'unit' => MealUnitEnum::SPOON],
                ['name' => 'Tereyağı', 'default_quantity' => 20, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Sucuk', 'default_quantity' => 50, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Simit', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
            ],
            'Ana Yemekler' => [
                ['name' => 'Kuru Fasulye', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Mercimek Köftesi', 'default_quantity' => 3, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Tavuk Şinitzel', 'default_quantity' => 150, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'İzmir Köfte', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Etli Kuru Fasulye', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Mantı', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Karnıyarık', 'default_quantity' => 2, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Patlıcan Musakka', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'İmam Bayıldı', 'default_quantity' => 2, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Türlü', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Fırında Tavuk', 'default_quantity' => 200, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Izgara Köfte', 'default_quantity' => 4, 'unit' => MealUnitEnum::PIECE],
            ],
            'Çorbalar' => [
                ['name' => 'Mercimek Çorbası', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Domates Çorbası', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Ezogelin Çorbası', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Tavuk Çorbası', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Yayla Çorbası', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Tarhana Çorbası', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'İşkembe Çorbası', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
            ],
            'Salatalar' => [
                ['name' => 'Çoban Salata', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Mevsim Salata', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Akdeniz Salatası', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Ton Balıklı Salata', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Tavuklu Sezar Salata', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Çin Salatası', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Közlenmiş Patlıcan Salatası', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
            ],
            'Pilavlar' => [
                ['name' => 'Pirinç Pilavı', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Bulgur Pilavı', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Şehriyeli Pilav', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'İç Pilav', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Nohutlu Pilav', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
            ],
            'Makarnalar' => [
                ['name' => 'Kıymalı Makarna', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Fırında Makarna', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Spagetti', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Penne Arabiata', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Kremalı Mantarlı Makarna', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
            ],
            'Tatlılar' => [
                ['name' => 'Baklava', 'default_quantity' => 2, 'unit' => MealUnitEnum::SLICE],
                ['name' => 'Künefe', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Sütlaç', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Kazandibi', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Revani', 'default_quantity' => 2, 'unit' => MealUnitEnum::SLICE],
                ['name' => 'Kemalpaşa', 'default_quantity' => 3, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Tulumba Tatlısı', 'default_quantity' => 3, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Lokma', 'default_quantity' => 5, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Profiterol', 'default_quantity' => 1, 'unit' => MealUnitEnum::PORTION],
                ['name' => 'Tiramisu', 'default_quantity' => 1, 'unit' => MealUnitEnum::SLICE],
            ],
            'İçecekler' => [
                ['name' => 'Çay', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Türk Kahvesi', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Filtre Kahve', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Ayran', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Şalgam', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Portakal Suyu', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Gazoz', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Kola', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
            ],
            'Meyveler' => [
                ['name' => 'Elma', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Armut', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Muz', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Portakal', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Mandalina', 'default_quantity' => 2, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Çilek', 'default_quantity' => 100, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Üzüm', 'default_quantity' => 100, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Karpuz', 'default_quantity' => 2, 'unit' => MealUnitEnum::SLICE],
                ['name' => 'Kavun', 'default_quantity' => 2, 'unit' => MealUnitEnum::SLICE],
                ['name' => 'Şeftali', 'default_quantity' => 2, 'unit' => MealUnitEnum::PIECE],
            ],
            'Atıştırmalıklar' => [
                ['name' => 'Fındık', 'default_quantity' => 30, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Badem', 'default_quantity' => 30, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Ceviz', 'default_quantity' => 30, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Fıstık', 'default_quantity' => 30, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Çekirdek', 'default_quantity' => 50, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Kuru Üzüm', 'default_quantity' => 30, 'unit' => MealUnitEnum::GRAM],
                ['name' => 'Kuru Kayısı', 'default_quantity' => 5, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Bisküvi', 'default_quantity' => 3, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Kraker', 'default_quantity' => 5, 'unit' => MealUnitEnum::PIECE],
            ],
            'Ekmekler' => [
                ['name' => 'Beyaz Ekmek', 'default_quantity' => 2, 'unit' => MealUnitEnum::SLICE],
                ['name' => 'Kepekli Ekmek', 'default_quantity' => 2, 'unit' => MealUnitEnum::SLICE],
                ['name' => 'Çavdar Ekmeği', 'default_quantity' => 2, 'unit' => MealUnitEnum::SLICE],
                ['name' => 'Tam Buğday Ekmeği', 'default_quantity' => 2, 'unit' => MealUnitEnum::SLICE],
                ['name' => 'Bazlama', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Lavaş', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
                ['name' => 'Yufka', 'default_quantity' => 1, 'unit' => MealUnitEnum::PIECE],
            ],
        ]);

        $meals->each(function ($categoryMeals, $categoryName) {
            $category = MealCategory::query()->firstWhere('name', $categoryName);

            if ($category) {
                collect($categoryMeals)->each(function ($mealData) use ($category) {
                    $category->meals()->create($mealData);
                });
            }
        });
    }
}
