<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Enums\BlogStatusEnum;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nutritionCategory = Category::query()->where('slug', 'beslenme-ve-diyet')->first();
        $healthyLifeCategory = Category::query()->where('slug', 'saglikli-yasam')->first();
        $recipesCategory = Category::query()->where('slug', 'saglikli-tarifler')->first();
        $sportsCategory = Category::query()->where('slug', 'spor-ve-beslenme')->first();

        $blogs = collect([
            [
                'title' => 'Dengeli Beslenme Nedir? Sağlıklı Yaşam İçin 10 Altın Kural',
                'status' => BlogStatusEnum::ACTIVE,
                'description' => 'Dengeli beslenme ile ilgili bilmeniz gereken her şey ve sağlıklı yaşam için pratik öneriler.',
                'content' => '<h2>Dengeli Beslenme Nedir?</h2>
<p>Dengeli beslenme, vücudumuzun ihtiyaç duyduğu tüm besin öğelerini yeterli ve dengeli miktarlarda almak anlamına gelir. Sağlıklı bir yaşam için dengeli beslenme şarttır.</p>

<h3>Dengeli Beslenmenin 10 Altın Kuralı</h3>
<ol>
<li><strong>Çeşitli Beslenin:</strong> Her besin grubundan yeterli miktarda tüketin.</li>
<li><strong>Bol Su İçin:</strong> Günde en az 2-2.5 litre su tüketmeye özen gösterin.</li>
<li><strong>Düzenli Öğün Saatleri:</strong> Öğünleri atlamamaya dikkat edin.</li>
<li><strong>Sebze ve Meyve Tüketin:</strong> Günde en az 5 porsiyon sebze ve meyve yiyin.</li>
<li><strong>Tam Tahıl Tercih Edin:</strong> Beyaz ekmek yerine tam buğday ekmeği seçin.</li>
<li><strong>Protein Dengesi:</strong> Et, tavuk, balık, yumurta ve baklagilleri dengeli tüketin.</li>
<li><strong>Şeker Tüketimini Azaltın:</strong> İşlenmiş şekerden uzak durun.</li>
<li><strong>Tuz Tüketimini Sınırlayın:</strong> Günlük tuz tüketiminizi kontrol edin.</li>
<li><strong>Sağlıklı Yağlar:</strong> Zeytinyağı, avokado gibi sağlıklı yağları tercih edin.</li>
<li><strong>Porsiyonlara Dikkat:</strong> Aşırı porsiyon tüketiminden kaçının.</li>
</ol>

<h3>Sonuç</h3>
<p>Dengeli beslenme, sadece kilo kontrolü değil, genel sağlığımız için de son derece önemlidir. Bu kurallara uyarak daha sağlıklı bir yaşam sürebilirsiniz.</p>',
                'category_id' => $nutritionCategory?->id,
                'is_featured' => true,
                'order' => 1,
                'seo_title' => 'Dengeli Beslenme Nedir? Sağlıklı Yaşam İçin 10 Altın Kural',
                'seo_description' => 'Dengeli beslenme ile sağlıklı yaşam için bilmeniz gereken 10 altın kuralı öğrenin. Diyetisyen önerileri ve pratik beslenme ipuçları.',
            ],
            [
                'title' => 'Kilo Vermenin Bilimsel Yolları: Sağlıklı ve Kalıcı Zayıflama',
                'status' => BlogStatusEnum::ACTIVE,
                'description' => 'Kilo vermek için bilimsel ve sağlıklı yöntemler. Kalıcı sonuçlar için diyetisyen önerileri.',
                'content' => '<h2>Sağlıklı Kilo Verme</h2>
<p>Kilo vermek, sadece estetik değil aynı zamanda sağlık açısından da önemlidir. Ancak bu süreç doğru ve bilimsel yöntemlerle yapılmalıdır.</p>

<h3>Kilo Verme Sürecinde Dikkat Edilmesi Gerekenler</h3>
<h4>1. Kalori Dengesi</h4>
<p>Kilo vermek için harcadığınız kaloriden daha az kalori almanız gerekir. Ancak bu aşırı kısıtlama anlamına gelmemeli.</p>

<h4>2. Metabolizma Hızı</h4>
<p>Düzenli egzersiz ve yeterli protein tüketimi ile metabolizma hızınızı artırabilirsiniz.</p>

<h4>3. Öğün Düzeni</h4>
<p>Öğün atlamak metabolizmayı yavaşlatır. Düzenli ve dengeli beslenin.</p>

<h4>4. Uyku ve Stres</h4>
<p>Yetersiz uyku ve stres, kilo vermeyi zorlaştırır. Düzenli uyku ve stres yönetimi önemlidir.</p>

<h3>Kaçınılması Gerekenler</h3>
<ul>
<li>Çok hızlı kilo verme</li>
<li>Tek tip beslenme</li>
<li>Aşırı kısıtlayıcı diyetler</li>
<li>Öğün atlama</li>
</ul>

<p>Unutmayın, her birey farklıdır. Kişiye özel beslenme programı için mutlaka bir diyetisyene danışın.</p>',
                'category_id' => $nutritionCategory?->id,
                'is_featured' => true,
                'order' => 2,
                'seo_title' => 'Kilo Vermenin Bilimsel Yolları | Sağlıklı Zayıflama Rehberi',
                'seo_description' => 'Kilo vermek için bilimsel ve sağlıklı yöntemler. Kalıcı zayıflama için diyetisyen önerileri ve pratik ipuçları.',
            ],
            [
                'title' => 'Kahvaltının Önemi: Günün En Önemli Öğünü Nasıl Olmalı?',
                'status' => BlogStatusEnum::ACTIVE,
                'description' => 'Kahvaltının sağlık üzerindeki etkileri ve ideal kahvaltı önerileri.',
                'content' => '<h2>Kahvaltı Neden Önemlidir?</h2>
<p>Kahvaltı, gece boyunca aç kalan vücudumuzun ilk enerji kaynağıdır. Güne doğru başlamak için ideal bir kahvaltı şarttır.</p>

<h3>İdeal Kahvaltıda Bulunması Gerekenler</h3>
<h4>Protein Kaynakları</h4>
<p>Yumurta, peynir, süt ürünleri gibi protein kaynakları tokluk hissi verir ve kas yapımını destekler.</p>

<h4>Karbonhidrat</h4>
<p>Tam tahıllı ekmek, yulaf gibi kompleks karbonhidratlar uzun süreli enerji sağlar.</p>

<h4>Sağlıklı Yağlar</h4>
<p>Ceviz, badem, avokado gibi sağlıklı yağ kaynakları beyin fonksiyonlarını destekler.</p>

<h4>Vitamin ve Mineraller</h4>
<p>Taze meyve ve sebzeler vitamin ve mineral ihtiyacını karşılar.</p>

<h3>Örnek Kahvaltı Menüsü</h3>
<ul>
<li>2 adet haşlanmış yumurta</li>
<li>2 dilim tam buğday ekmeği</li>
<li>Beyaz peynir ve zeytin</li>
<li>Domates, salatalık</li>
<li>1 porsiyon meyve</li>
<li>1 bardak süt veya ayran</li>
</ul>

<p>Düzenli ve dengeli kahvaltı yaparak güne enerjik başlayabilir, gün içi atıştırma isteğinizi azaltabilirsiniz.</p>',
                'category_id' => $healthyLifeCategory?->id,
                'is_featured' => false,
                'order' => 3,
                'seo_title' => 'Kahvaltının Önemi | İdeal Kahvaltı Nasıl Olmalı?',
                'seo_description' => 'Kahvaltının sağlık üzerindeki etkileri ve ideal kahvaltı önerileri. Diyetisyen onaylı kahvaltı menüleri.',
            ],
            [
                'title' => 'Protein Tozu Kullanmalı mıyım? Spor ve Beslenme Rehberi',
                'status' => BlogStatusEnum::ACTIVE,
                'description' => 'Protein tozunun faydaları, zararları ve doğru kullanımı hakkında bilmeniz gerekenler.',
                'content' => '<h2>Protein Tozu Nedir?</h2>
<p>Protein tozu, sporcuların ve aktif yaşam süren bireylerin protein ihtiyaçlarını karşılamak için kullanılan besin takviyesidir.</p>

<h3>Protein Tozu Kimlere Önerilir?</h3>
<ul>
<li>Düzenli spor yapan bireyler</li>
<li>Kas kütlesi artırmak isteyenler</li>
<li>Günlük protein ihtiyacını yeterince karşılayamayanlar</li>
<li>Toparlanma sürecini hızlandırmak isteyenler</li>
</ul>

<h3>Protein Tozu Türleri</h3>
<h4>Whey Protein</h4>
<p>Hızlı emilim özelliği vardır. Antrenman sonrası kullanıma uygundur.</p>

<h4>Kazein Protein</h4>
<p>Yavaş emilim özelliği vardır. Gece kullanımı için idealdir.</p>

<h4>Bitkisel Protein</h4>
<p>Vegan bireyler için alternatiftir. Bezelye, pirinç veya soya bazlı olabilir.</p>

<h3>Kullanım Önerileri</h3>
<p>Protein tozu kullanmadan önce mutlaka bir diyetisyen veya spor hekimine danışın. Gereksiz ve aşırı kullanım böbrek ve karaciğer üzerinde yük oluşturabilir.</p>

<h3>Doğal Protein Kaynakları</h3>
<p>Unutmayın, doğal besinlerden protein almak her zaman öncelikli olmalıdır:</p>
<ul>
<li>Tavuk, hindi</li>
<li>Balık</li>
<li>Yumurta</li>
<li>Baklagiller</li>
<li>Süt ürünleri</li>
</ul>',
                'category_id' => $sportsCategory?->id,
                'is_featured' => true,
                'order' => 4,
                'seo_title' => 'Protein Tozu Kullanmalı mıyım? | Spor Beslenmesi Rehberi',
                'seo_description' => 'Protein tozunun faydaları, zararları ve doğru kullanımı. Diyetisyen önerileri ile spor beslenmesi rehberi.',
            ],
            [
                'title' => 'Detoks Diyetleri: Gerçekten İşe Yarıyor mu?',
                'status' => BlogStatusEnum::ACTIVE,
                'description' => 'Detoks diyetleri hakkında bilimsel gerçekler ve sağlıklı alternatifler.',
                'content' => '<h2>Detoks Diyeti Nedir?</h2>
<p>Detoks diyetleri, vücuttaki toksinlerin temizlendiği iddia edilen kısa süreli beslenme programlarıdır. Ancak bilimsel gerçekler farklıdır.</p>

<h3>Bilimsel Gerçekler</h3>
<h4>Vücudun Doğal Detoks Sistemi</h4>
<p>Vücudumuz, karaciğer, böbrekler ve bağışıklık sistemi aracılığıyla zaten sürekli detoks yapmaktadır. Özel bir diyete ihtiyaç yoktur.</p>

<h4>Detoks Diyetlerinin Riskleri</h4>
<ul>
<li>Besin öğesi eksiklikleri</li>
<li>Metabolizma yavaşlaması</li>
<li>Kas kaybı</li>
<li>Enerji düşüklüğü</li>
<li>Baş ağrısı ve halsizlik</li>
</ul>

<h3>Sağlıklı Alternatifler</h3>
<h4>Bol Su Tüketimi</h4>
<p>Günde 2-3 litre su içmek, böbreklerin çalışmasını destekler.</p>

<h4>Lifli Besinler</h4>
<p>Sebze, meyve ve tam tahıllar sindirim sistemini destekler.</p>

<h4>İşlenmiş Gıdalardan Kaçınma</h4>
<p>Doğal ve taze besinleri tercih edin.</p>

<h4>Düzenli Egzersiz</h4>
<p>Ter yoluyla toksin atılımını destekler.</p>

<h4>Yeterli Uyku</h4>
<p>Vücudun onarım süreçleri için 7-8 saat uyku önemlidir.</p>

<h3>Sonuç</h3>
<p>Mucize diyetler yerine sürdürülebilir, dengeli beslenme ve sağlıklı yaşam tarzı benimseyin. Özel bir sağlık durumunuz varsa mutlaka uzmana danışın.</p>',
                'category_id' => $healthyLifeCategory?->id,
                'is_featured' => false,
                'order' => 5,
                'seo_title' => 'Detoks Diyetleri Gerçekten İşe Yarıyor mu? | Bilimsel Gerçekler',
                'seo_description' => 'Detoks diyetleri hakkında bilimsel gerçekler ve sağlıklı alternatifler. Diyetisyen görüşleri ve öneriler.',
            ],
            [
                'title' => 'Yulaf Ezmeli Pancake Tarifi: Sağlıklı ve Pratik Kahvaltı',
                'status' => BlogStatusEnum::ACTIVE,
                'description' => 'Protein açısından zengin, sağlıklı ve lezzetli yulaf ezmeli pancake tarifi.',
                'content' => '<h2>Sağlıklı Yulaf Pancake</h2>
<p>Kahvaltılarınızı renklendirmek ve sağlıklı bir başlangıç yapmak için harika bir tarif. Hem pratik hem de besleyici!</p>

<h3>Malzemeler</h3>
<ul>
<li>1 su bardağı yulaf ezmesi</li>
<li>2 adet yumurta</li>
<li>1 su bardağı süt (isterseniz badem sütü)</li>
<li>1 yemek kaşığı bal</li>
<li>1 çay kaşığı kabartma tozu</li>
<li>1 çay kaşığı vanilya</li>
<li>Pişirmek için az miktarda hindistan cevizi yağı</li>
</ul>

<h3>Yapılışı</h3>
<ol>
<li>Yulaf ezmesini rondoda un haline getirin.</li>
<li>Tüm malzemeleri derin bir kapta karıştırın.</li>
<li>Kıvamı hafif akışkan olmalıdır, gerekirse süt ekleyin.</li>
<li>Yapışmaz tavayı ısıtın ve az miktarda yağ sürün.</li>
<li>Hamurdan kepçe ile alıp tavaya dökün.</li>
<li>Yüzeyde baloncuklar oluşunca çevirin.</li>
<li>Her iki tarafı da pişirin.</li>
</ol>

<h3>Sunum Önerileri</h3>
<ul>
<li>Taze meyve dilimleri</li>
<li>Az miktarda bal veya ahududu sosu</li>
<li>Ceviz veya badem parçacıkları</li>
<li>Az miktarda Yunan yoğurdu</li>
</ul>

<h3>Besin Değerleri (Porsiyon)</h3>
<ul>
<li>Kalori: ~250 kcal</li>
<li>Protein: 12g</li>
<li>Karbonhidrat: 35g</li>
<li>Yağ: 7g</li>
</ul>

<h3>Diyetisyen Notu</h3>
<p>Bu tarif, kahvaltınıza protein ve kompleks karbonhidrat eklemek için harika bir yoldur. Tokluk hissi sağlar ve gün içi atıştırma isteğini azaltır. Şeker yerine bal kullanılması daha sağlıklıdır ancak miktara dikkat edin.</p>

<p><strong>İpucu:</strong> Bir seferde fazla yapıp dondurabilirsiniz. Sabah toaster’da ısıtarak pratik bir kahvaltı yapabilirsiniz!</p>',
                'category_id' => $recipesCategory?->id,
                'is_featured' => false,
                'order' => 6,
                'seo_title' => 'Yulaf Ezmeli Pancake Tarifi | Sağlıklı Kahvaltı',
                'seo_description' => 'Protein açısından zengin, sağlıklı ve lezzetli yulaf ezmeli pancake tarifi. Diyetisyen onaylı, pratik kahvaltı tarifi.',
            ],
        ]);

        $blogs->each(fn($blog) => Blog::query()->create($blog));
    }
}
