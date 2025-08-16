<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Elif K.',
                'review' => 'Ayşe Hanım sayesinde sağlıklı bir şekilde 8 kilo verdim. Bana özel hazırladığı diyet listesiyle hiç zorlanmadım.',
                'rating' => 5,
                'status' => true,
            ],
            [
                'client_name' => 'Mert A.',
                'review' => 'Spor yaparken doğru beslenme konusunda çok yardımcı oldu. Performansım gözle görülür şekilde arttı.',
                'rating' => 5,
                'status' => true,
            ],
            [
                'client_name' => 'Zeynep D.',
                'review' => 'Gebelik dönemimde bana uygun bir beslenme planı hazırladı. Hem ben hem de bebeğim çok sağlıklı ilerledik.',
                'rating' => 5,
                'status' => true,
            ],
            [
                'client_name' => 'Ahmet Y.',
                'review' => 'Yıllardır diyabetim var. Ayşe Hanım’ın önerileri sayesinde kan şekerim çok daha dengeli.',
                'rating' => 4,
                'status' => true,
            ],
            [
                'client_name' => 'Melis Ç.',
                'review' => 'Kilo vermek hiç bu kadar kolay olmamıştı. Diyet listeleri çok pratik ve lezzetliydi.',
                'rating' => 5,
                'status' => true,
            ],
            [
                'client_name' => 'Caner T.',
                'review' => 'Uzun süredir sağlıklı beslenme alışkanlığı kazanmak istiyordum. Sayesinde bunu başardım.',
                'rating' => 4,
                'status' => true,
            ],
            [
                'client_name' => 'Seda L.',
                'review' => 'Yoğun iş temposunda bile uygulayabileceğim beslenme planları hazırladı. Çok memnun kaldım.',
                'rating' => 5,
                'status' => true,
            ],
            [
                'client_name' => 'Burak S.',
                'review' => 'Sıcakkanlı ve ilgili yaklaşımıyla motivasyonumu sürekli yüksek tuttu. Kilo verme sürecim çok keyifli geçti.',
                'rating' => 5,
                'status' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::query()->create($testimonial);
        }
    }
}
