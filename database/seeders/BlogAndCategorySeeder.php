<?php

namespace Database\Seeders;

use App\Enums\BlogStatusEnum;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogAndCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Beslenme', 'description' => 'Sağlıklı beslenme ve diyet önerileri', 'order' => 1, 'status' => true],
            ['name' => 'Kilo Kontrolü', 'description' => 'Kilo verme ve kilo alma yöntemleri', 'order' => 2, 'status' => true],
            ['name' => 'Spor ve Fitness', 'description' => 'Sporcular ve egzersiz ile ilgili makaleler', 'order' => 3, 'status' => true],
            ['name' => 'Gebelik', 'description' => 'Gebelik ve anne sağlığı ile ilgili yazılar', 'order' => 4, 'status' => true],
            ['name' => 'Çocuk Beslenmesi', 'description' => 'Çocuklar için sağlıklı beslenme ipuçları', 'order' => 5, 'status' => true],
            ['name' => 'Kronik Hastalıklar', 'description' => 'Diyabet, hipertansiyon ve benzeri hastalıklar', 'order' => 6, 'status' => true],
            ['name' => 'Psikoloji ve Motivasyon', 'description' => 'Motivasyon, psikolojik sağlık ve alışkanlıklar', 'order' => 7, 'status' => true],
            ['name' => 'Sağlıklı Tarifler', 'description' => 'Evde kolayca yapılabilecek sağlıklı tarifler', 'order' => 8, 'status' => true],
        ];

        $categoryModels = [];
        foreach ($categories as $cat) {
            $categoryModels[] = Category::query()->create($cat);
        }

        // 8 adet blog oluştur ve kategorilere bağla
        $blogs = [
            [
                'title' => 'Kilo Vermede Başarılı Olmanın 5 Yolu',
                'description' => 'Kilo verirken dikkat edilmesi gereken temel noktalar',
                'content' => '<p>Kilo verme süreci disiplin ve doğru beslenmeyle mümkündür...</p>',
                'category_id' => $categoryModels[1]->id, // Kilo Kontrolü
                'order' => 1,
                'status' => BlogStatusEnum::ACTIVE,
                'is_featured' => true,
                'cover_image' => 'blogs/kilo-verme.jpg',
                'seo_title' => 'Kilo Vermede Başarılı Olmanın 5 Yolu',
                'seo_description' => 'Kilo verirken dikkat edilmesi gereken temel noktalar',
                'seo_keywords' => 'kilo verme, diyet, sağlıklı yaşam',
            ],
            [
                'title' => 'Gebelikte Beslenme Rehberi',
                'description' => 'Anne ve bebek sağlığı için öneriler',
                'content' => '<p>Gebelik boyunca dengeli beslenme çok önemlidir...</p>',
                'category_id' => $categoryModels[3]->id, // Gebelik
                'order' => 2,
                'status' => BlogStatusEnum::ACTIVE,
                'is_featured' => false,
                'cover_image' => 'blogs/gebelik-beslenme.jpg',
                'seo_title' => 'Gebelikte Beslenme Rehberi',
                'seo_description' => 'Anne ve bebek sağlığı için beslenme önerileri',
                'seo_keywords' => 'gebelik diyeti, anne sağlığı, beslenme',
            ],
            [
                'title' => 'Sporcular için Protein Önerileri',
                'description' => 'Kas gelişimi ve performans için protein tüketimi',
                'content' => '<p>Sporcuların protein ihtiyacı yaş ve aktivite seviyesine göre değişir...</p>',
                'category_id' => $categoryModels[2]->id, // Spor ve Fitness
                'order' => 3,
                'status' => BlogStatusEnum::ACTIVE,
                'is_featured' => true,
                'cover_image' => 'blogs/sporcu-protein.jpg',
                'seo_title' => 'Sporcular için Protein Önerileri',
                'seo_description' => 'Kas gelişimi ve performans için protein tüketimi',
                'seo_keywords' => 'sporcu beslenmesi, protein, fitness',
            ],
            [
                'title' => 'Çocuklar İçin Sağlıklı Atıştırmalıklar',
                'description' => 'Evde kolayca hazırlayabileceğiniz sağlıklı atıştırmalıklar',
                'content' => '<p>Çocukların sağlıklı beslenmesi büyüme ve gelişim için çok önemlidir...</p>',
                'category_id' => $categoryModels[4]->id, // Çocuk Beslenmesi
                'order' => 4,
                'status' => BlogStatusEnum::ACTIVE,
                'is_featured' => false,
                'cover_image' => 'blogs/cocuk-atis.jpg',
                'seo_title' => 'Çocuklar İçin Sağlıklı Atıştırmalıklar',
                'seo_description' => 'Çocuklar için sağlıklı atıştırmalık önerileri',
                'seo_keywords' => 'çocuk diyeti, atıştırmalık, sağlıklı beslenme',
            ],
            [
                'title' => 'Diyabet Hastaları İçin Beslenme Önerileri',
                'description' => 'Kan şekeri dengesi için önemli ipuçları',
                'content' => '<p>Diyabet hastalarının beslenme planı doktor ve diyetisyen kontrolünde olmalıdır...</p>',
                'category_id' => $categoryModels[5]->id, // Kronik Hastalıklar
                'order' => 5,
                'status' => BlogStatusEnum::ACTIVE,
                'is_featured' => false,
                'cover_image' => 'blogs/diyabet-beslenme.jpg',
                'seo_title' => 'Diyabet Hastaları İçin Beslenme Önerileri',
                'seo_description' => 'Kan şekeri dengesi için önemli beslenme ipuçları',
                'seo_keywords' => 'diyabet diyeti, kan şekeri, beslenme',
            ],
            [
                'title' => 'Sağlıklı Smoothie Tarifleri',
                'description' => 'Evde kolayca hazırlayabileceğiniz smoothie tarifleri',
                'content' => '<p>Smoothie hem sağlıklı hem de lezzetli bir seçenektir...</p>',
                'category_id' => $categoryModels[7]->id, // Sağlıklı Tarifler
                'order' => 6,
                'status' => BlogStatusEnum::ACTIVE,
                'is_featured' => true,
                'cover_image' => 'blogs/smoothie.jpg',
                'seo_title' => 'Sağlıklı Smoothie Tarifleri',
                'seo_description' => 'Evde yapılabilecek sağlıklı smoothie tarifleri',
                'seo_keywords' => 'smoothie, sağlıklı tarif, smoothie tarifi',
            ],
            [
                'title' => 'Motivasyon ve Alışkanlıklar',
                'description' => 'Kilo kontrolünde motivasyonun önemi ve alışkanlık oluşturma',
                'content' => '<p>Sağlıklı yaşam için küçük alışkanlıklar büyük fark yaratır...</p>',
                'category_id' => $categoryModels[6]->id, // Psikoloji ve Motivasyon
                'order' => 7,
                'status' => BlogStatusEnum::ACTIVE,
                'is_featured' => false,
                'cover_image' => 'blogs/motivasyon.jpg',
                'seo_title' => 'Motivasyon ve Alışkanlıklar',
                'seo_description' => 'Kilo kontrolünde motivasyon ve alışkanlık önerileri',
                'seo_keywords' => 'motivasyon, alışkanlık, sağlıklı yaşam',
            ],
            [
                'title' => 'Dengeli Beslenme İpuçları',
                'description' => 'Günlük beslenmenizi dengede tutacak öneriler',
                'content' => '<p>Dengeli beslenme, sağlıklı yaşamın temelidir...</p>',
                'category_id' => $categoryModels[0]->id, // Beslenme
                'order' => 8,
                'status' => BlogStatusEnum::ACTIVE,
                'is_featured' => true,
                'cover_image' => 'blogs/dengeli-beslenme.jpg',
                'seo_title' => 'Dengeli Beslenme İpuçları',
                'seo_description' => 'Günlük beslenmenizi dengede tutacak ipuçları',
                'seo_keywords' => 'beslenme, sağlıklı yaşam, diyet',
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::query()->create($blog);
        }
    }


}
