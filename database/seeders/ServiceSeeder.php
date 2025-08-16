<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Kilo Kontrolü',
                'description' => 'Sağlıklı ve sürdürülebilir şekilde kilo verme ve kilo alma süreçlerinde danışmanlık.',
                'order' => 1,
                'status' => true,
                'image' => 'services/kilo-kontrolu.jpg',
                'seo_title' => 'Kilo Kontrolü - Diyetisyen Hizmeti',
                'seo_description' => 'Kilo verme ve kilo alma süreçlerinde uzman diyetisyen danışmanlığı.',
                'seo_keywords' => 'diyet, kilo kontrolü, zayıflama, kilo alma',
            ],
            [
                'name' => 'Sporcu Beslenmesi',
                'description' => 'Sporcular için performans artırıcı ve sağlıklı beslenme programları.',
                'order' => 2,
                'status' => true,
                'image' => 'services/sporcu-beslenmesi.jpg',
                'seo_title' => 'Sporcu Beslenmesi - Performans Diyeti',
                'seo_description' => 'Sporculara özel enerji ve performans odaklı beslenme planları.',
                'seo_keywords' => 'sporcu diyeti, beslenme, fitness, performans',
            ],
            [
                'name' => 'Gebelik ve Emzirme Dönemi Beslenmesi',
                'description' => 'Anne adayları ve emziren anneler için özel beslenme danışmanlığı.',
                'order' => 3,
                'status' => true,
                'image' => 'services/gebelik-beslenmesi.jpg',
                'seo_title' => 'Gebelik ve Emzirme Dönemi Beslenmesi',
                'seo_description' => 'Anne ve bebek sağlığı için gebelik ve emzirme döneminde doğru beslenme.',
                'seo_keywords' => 'gebelik diyeti, anne beslenmesi, emzirme dönemi, sağlıklı beslenme',
            ],
            [
                'name' => 'Kronik Hastalıklarda Beslenme',
                'description' => 'Diyabet, hipertansiyon ve benzeri kronik hastalıklarda beslenme desteği.',
                'order' => 4,
                'status' => true,
                'image' => 'services/kronik-hastalik.jpg',
                'seo_title' => 'Kronik Hastalıklarda Beslenme',
                'seo_description' => 'Kronik rahatsızlıkları olan bireyler için sağlıklı beslenme çözümleri.',
                'seo_keywords' => 'diyabet diyeti, hipertansiyon, kalp sağlığı, kronik hastalık',
            ],
        ];

        foreach ($services as $service) {
            Service::query()->create($service);
        }
    }
}
