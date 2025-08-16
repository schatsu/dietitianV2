<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title'   => 'Diyetisyen Ayşe Yılmaz',
            'slug'    => 'diyetisyen-ayse-yilmaz',
            'content' => '
                <h2>Diyetisyen Ayşe Yılmaz</h2>
                <p>
                    <strong>Diyetisyen Ayşe Yılmaz</strong>, beslenme ve diyetetik alanında uzmanlaşmış,
                    danışanlarına <em>sağlıklı yaşam yolculuklarında</em> rehberlik eden bir uzmandır.
                    Eğitim hayatı boyunca edindiği teorik bilgileri, yıllar içerisinde elde ettiği
                    deneyimlerle birleştirerek kişiye özel çözümler üretmektedir.
                </p>

                <h3>Uzmanlık Alanları</h3>
                <ul>
                    <li>Kilo kontrolü ve obezite tedavisi</li>
                    <li>Sporcu beslenmesi</li>
                    <li>Gebelik ve emzirme döneminde beslenme</li>
                    <li>Çocuklarda sağlıklı beslenme alışkanlıkları</li>
                    <li>Diyabet, tansiyon gibi kronik hastalıklarda beslenme</li>
                </ul>

                <p>
                    Diyetisyen Ayşe Yılmaz, yalnızca kısa süreli diyet listeleri sunmak yerine,
                    danışanlarının yaşam boyu sürdürebilecekleri <strong>sağlıklı ve dengeli beslenme alışkanlıkları</strong>
                    edinmelerini amaçlar. Danışanlarıyla bire bir ilgilenerek onların ihtiyaçlarını,
                    yaşam tarzlarını ve hedeflerini analiz eder; her bireye özel programlar hazırlar.
                </p>

                <blockquote>
                    “Sağlıklı beslenme, sadece kilo vermek değil; beden, zihin ve ruh bütünlüğünü destekleyen
                    sürdürülebilir bir yaşam biçimidir.”
                </blockquote>

                <p>
                    Bu yaklaşımı sayesinde Ayşe Yılmaz, danışanlarının motivasyonlarını yüksek tutmayı,
                    sosyal yaşamlarına uyumlu, pratik ve keyifli beslenme önerileri geliştirmeyi
                    her zaman ön planda tutmaktadır.
                </p>
            ',
        ]);
    }
}
