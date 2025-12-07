<?php

namespace Database\Seeders;

use App\Enums\ClientActivityLevelEnum;
use App\Enums\ClientAlcoholConsumptionEnum;
use App\Enums\ClientSmokingStatusEnum;
use App\Enums\ClientStatusEnum;
use App\Enums\GenderEnum;
use App\Enums\GoalTypeEnum;
use App\Models\Client;
use App\Models\ClientLifestyleProfile;
use App\Models\ClientMedicalProfile;
use App\Models\ClientNutritionProfile;
use App\Models\ClientPhysicalProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientsData = [
            [
                'first_name' => 'Elif',
                'last_name' => 'Kaya',
                'email' => 'elif.kaya@mail.com',
                'phone' => '05321234567',
                'occupation' => 'Yazılım Mühendisi',
                'age' => 28,
                'gender' => GenderEnum::FEMALE,
                'status' => ClientStatusEnum::ACTIVE,
                'medical' => [
                    'medical_conditions' => [['medical_conditions' => 'Migren (Atak dönemleri)']],
                    'medications' => [['medications' => 'İbuprofen (Gerektiğinde)']],
                    'allergies' => [],
                    'food_allergies' => [['food_allergies' => 'Çilek']],
                    'additional_medical_notes' => 'Yoğun ışık ve uzun süreli ekran kullanımı migreni tetikleyebilir.',
                ],
                'nutrition' => [
                    'favorite_foods' => [['favorite_foods' => 'Avokadolu tost'], ['favorite_foods' => 'Somon']],
                    'disliked_foods' => [['disliked_foods' => 'İşkembe'], ['disliked_foods' => 'Bamya']],
                    'dietary_restrictions' => [],
                    'meal_frequency' => 'Günde 3 Ana Öğün',
                ],
                'physical' => [
                    'initial_weight' => 60.5, 'initial_height' => 170, 'target_weight' => 58, 'goal_type' => GoalTypeEnum::WEIGHT_LOSS,
                ],
                'lifestyle' => [
                    'activity_level' => ClientActivityLevelEnum::SEDENTARY, 'sleep_hours' => 7, 'water_intake' => '2.5 Litre',
                    'smoking_status' => ClientSmokingStatusEnum::NON_SMOKER, 'alcohol_consumption' => ClientAlcoholConsumptionEnum::OCCASIONAL,
                    'extra_notes' => 'Haftada 2-3 gün yürüyüş yapıyor.',
                ]
            ],
            [
                'first_name' => 'Mehmet',
                'last_name' => 'Öztürk',
                'email' => 'mehmet.ozturk@mail.com',
                'phone' => '05412345678',
                'occupation' => 'Mimar',
                'age' => 35,
                'gender' => GenderEnum::MALE,
                'status' => ClientStatusEnum::ACTIVE,
                'medical' => [
                    'medical_conditions' => [['medical_conditions' => 'Mevsimsel Alerjik Rinit']],
                    'medications' => [['medications' => 'Cetirizine (Bahar aylarında)']],
                    'allergies' => [['allergies' => 'Polen'], ['allergies' => 'Ev Tozu Akarları']],
                    'food_allergies' => [['food_allergies' => 'Yer fıstığı']],
                    'additional_medical_notes' => 'Bahar aylarında gözlerde kaşıntı ve sulanma artışı yaşanır.',
                ],
                'nutrition' => [
                    'favorite_foods' => [['favorite_foods' => 'Köfte'], ['favorite_foods' => 'Mercimek Çorbası']],
                    'disliked_foods' => [['disliked_foods' => 'Enginar'], ['disliked_foods' => 'Pırasa']],
                    'dietary_restrictions' => [['dietary_restrictions' => 'Mevsimsel alerjilere dikkat (Polen dönemi)']],
                    'meal_frequency' => 'Günde 2 Ana Öğün, 1 Ara Öğün',
                ],
                'physical' => [
                    'initial_weight' => 85, 'initial_height' => 180, 'target_weight' => 85, 'goal_type' => GoalTypeEnum::WEIGHT_MAINTENANCE,
                ],
                'lifestyle' => [
                    'activity_level' => ClientActivityLevelEnum::LIGHT, 'sleep_hours' => 6, 'water_intake' => '1.5 Litre',
                    'smoking_status' => ClientSmokingStatusEnum::OCCASIONAL, 'alcohol_consumption' => ClientAlcoholConsumptionEnum::OCCASIONAL,
                    'extra_notes' => 'İş yoğunluğu nedeniyle uyku düzeni bazen bozuluyor.',
                ]
            ],
            [
                'first_name' => 'Ayşe',
                'last_name' => 'Demir',
                'email' => 'ayse.demir@mail.com',
                'phone' => '05053456789',
                'occupation' => 'Diş Hekimi',
                'age' => 45,
                'gender' => GenderEnum::FEMALE,
                'status' => ClientStatusEnum::PASSIVE,
                'medical' => [
                    'medical_conditions' => [['medical_conditions' => 'Hafif Hipertansiyon']],
                    'medications' => [['medications' => 'Labetalol (Günlük)']],
                    'allergies' => [['allergies' => 'Penasilin']],
                    'food_allergies' => [['food_allergies' => 'Kabuklu Deniz Ürünleri']],
                    'additional_medical_notes' => 'Kan basıncı kontrol altında. Diş operasyonlarında adrenalinli anesteziye dikkat edilmeli.',
                ],
                'nutrition' => [
                    'favorite_foods' => [['favorite_foods' => 'Izgara Tavuk'], ['favorite_foods' => 'Yeşil Salata']],
                    'disliked_foods' => [['disliked_foods' => 'Kızartmalar'], ['disliked_foods' => 'Yağlı tatlılar']],
                    'dietary_restrictions' => [['dietary_restrictions' => 'Tuz ve yağ tüketimini sınırlama']],
                    'meal_frequency' => 'Günde 3 Öğün (Tuzsuz ve hafif)',
                ],
                'physical' => [
                    'initial_weight' => 70, 'initial_height' => 165, 'target_weight' => 65, 'goal_type' => GoalTypeEnum::HEALTHY_NUTRITION,
                ],
                'lifestyle' => [
                    'activity_level' => ClientActivityLevelEnum::LIGHT, 'sleep_hours' => 7, 'water_intake' => '2 Litre',
                    'smoking_status' => ClientSmokingStatusEnum::NON_SMOKER, 'alcohol_consumption' => ClientAlcoholConsumptionEnum::NONE,
                    'extra_notes' => 'Haftada bir pilates dersi alıyor.',
                ]
            ],
            [
                'first_name' => 'Mustafa',
                'last_name' => 'Yılmaz',
                'email' => 'mustafa.yilmaz@mail.com',
                'phone' => '05544567890',
                'occupation' => 'Avukat',
                'age' => 52,
                'gender' => GenderEnum::MALE,
                'status' => ClientStatusEnum::ACTIVE,
                'medical' => [
                    'medical_conditions' => [['medical_conditions' => 'Reflü (Gastroözofageal)']],
                    'medications' => [['medications' => 'Omeprazol (Günde tek doz)']],
                    'allergies' => [['allergies' => 'Lateks']],
                    'food_allergies' => [['food_allergies' => 'Acı biber']],
                    'additional_medical_notes' => 'Stresli dönemlerde mide yanması şikayetleri artar.',
                ],
                'nutrition' => [
                    'favorite_foods' => [['favorite_foods' => 'Etli Güveç'], ['favorite_foods' => 'Cacık']],
                    'disliked_foods' => [['disliked_foods' => 'Kahve'], ['disliked_foods' => 'Baharatlı yiyecekler']],
                    'dietary_restrictions' => [['dietary_restrictions' => 'Asitli ve baharatlı yiyeceklerden uzak durma']],
                    'meal_frequency' => 'Günde 4-5 Küçük Öğün (Mideyi yormamak için)',
                ],
                'physical' => [
                    'initial_weight' => 95, 'initial_height' => 175, 'target_weight' => 88, 'goal_type' => GoalTypeEnum::WEIGHT_LOSS,
                ],
                'lifestyle' => [
                    'activity_level' => ClientActivityLevelEnum::SEDENTARY, 'sleep_hours' => 5, 'water_intake' => '1 Litre',
                    'smoking_status' => ClientSmokingStatusEnum::REGULAR, 'alcohol_consumption' => ClientAlcoholConsumptionEnum::REGULAR,
                    'extra_notes' => 'Hafta sonu tenis oynamaya çalışıyor.',
                ]
            ],
            [
                'first_name' => 'Zeynep',
                'last_name' => 'Çelik',
                'email' => 'zeynep.celik@mail.com',
                'phone' => '05355678901',
                'occupation' => 'İç Mimar',
                'age' => 31,
                'gender' => GenderEnum::FEMALE,
                'status' => ClientStatusEnum::ACTIVE,
                'medical' => [
                    'medical_conditions' => [['medical_conditions' => 'Tiroid Fonksiyon Bozukluğu (Hipotiroidi)']],
                    'medications' => [['medications' => 'Levotiroksin (Günlük)']],
                    'allergies' => [],
                    'food_allergies' => [['food_allergies' => 'Gluten (Hafif hassasiyet)']],
                    'additional_medical_notes' => 'Tiroid değerleri düzenli olarak takip edilmelidir.',
                ],
                'nutrition' => [
                    'favorite_foods' => [['favorite_foods' => 'Sebzeli Omlet'], ['favorite_foods' => 'Badem']],
                    'disliked_foods' => [['disliked_foods' => 'Makarna'], ['disliked_foods' => 'Beyaz Ekmek']],
                    'dietary_restrictions' => [['dietary_restrictions' => 'Gluten hassasiyeti (Çapraz bulaşmaya dikkat)'], ['dietary_restrictions' => 'Şekerli içecekler yok']],
                    'meal_frequency' => 'Günde 3 Ana Öğün (Karbonhidrat kontrollü)',
                ],
                'physical' => [
                    'initial_weight' => 68, 'initial_height' => 172, 'target_weight' => 65, 'goal_type' => GoalTypeEnum::BODY_SHAPING,
                ],
                'lifestyle' => [
                    'activity_level' => ClientActivityLevelEnum::MODERATE, 'sleep_hours' => 8, 'water_intake' => '3 Litre',
                    'smoking_status' => ClientSmokingStatusEnum::NON_SMOKER, 'alcohol_consumption' => ClientAlcoholConsumptionEnum::NONE,
                    'extra_notes' => 'Spor salonunda düzenli ağırlık antrenmanları yapıyor.',
                ]
            ],
            [
                'first_name' => 'Kerem',
                'last_name' => 'Yıldırım',
                'email' => 'kerem.yildirim@mail.com',
                'phone' => '05426789012',
                'occupation' => 'Pazarlama Uzmanı',
                'age' => 38,
                'gender' => GenderEnum::MALE,
                'status' => ClientStatusEnum::ACTIVE,
                'medical' => [
                    'medical_conditions' => [['medical_conditions' => 'Tekrarlayan Bel Ağrısı']],
                    'medications' => [['medications' => 'Kas Gevşetici (Kısa süreli, gerektiğinde)']],
                    'allergies' => [['allergies' => 'Arı sokması']],
                    'food_allergies' => [['food_allergies' => 'Mantar']],
                    'additional_medical_notes' => 'Ağır kaldırmaktan kaçınmalı. Fizik tedavi seanslarına devam ediyor.',
                ],
                'nutrition' => [
                    'favorite_foods' => [['favorite_foods' => 'Lahana Sarması'], ['favorite_foods' => 'Yoğurt']],
                    'disliked_foods' => [['disliked_foods' => 'Şalgam suyu'], ['disliked_foods' => 'Konserve yiyecekler']],
                    'dietary_restrictions' => [['dietary_restrictions' => 'Yüksek proteinli beslenmeye özen gösterme']],
                    'meal_frequency' => 'Günde 3 Ana Öğün',
                ],
                'physical' => [
                    'initial_weight' => 82, 'initial_height' => 178, 'target_weight' => 85, 'goal_type' => GoalTypeEnum::MUSCLE_GAIN,
                ],
                'lifestyle' => [
                    'activity_level' => ClientActivityLevelEnum::MODERATE, 'sleep_hours' => 6, 'water_intake' => '2 Litre',
                    'smoking_status' => ClientSmokingStatusEnum::NON_SMOKER, 'alcohol_consumption' => ClientAlcoholConsumptionEnum::OCCASIONAL,
                    'extra_notes' => 'Haftada 3 gün fitness yapıyor.',
                ]
            ],
            [
                'first_name' => 'Selin',
                'last_name' => 'Aksoy',
                'email' => 'selin.aksoy@mail.com',
                'phone' => '05077890123',
                'occupation' => 'Öğretmen',
                'age' => 25,
                'gender' => GenderEnum::FEMALE,
                'status' => ClientStatusEnum::ACTIVE,
                'medical' => [
                    'medical_conditions' => [['medical_conditions' => 'Astım (Kontrol altında)']],
                    'medications' => [['medications' => 'Salbutamol (Nefes açıcı, gerektiğinde)']],
                    'allergies' => [['allergies' => 'Kedi Tüyü']],
                    'food_allergies' => [['food_allergies' => 'Süt ve Süt Ürünleri (Laktoz intoleransı)']],
                    'additional_medical_notes' => 'Soğuk hava ve yoğun egzersiz bazen astım semptomlarını tetikler.',
                ],
                'nutrition' => [
                    'favorite_foods' => [['favorite_foods' => 'Zeytinyağlılar'], ['favorite_foods' => 'Meyveler']],
                    'disliked_foods' => [['disliked_foods' => 'Kırmızı Et'], ['disliked_foods' => 'Pizza']],
                    'dietary_restrictions' => [['dietary_restrictions' => 'Laktoz İntoleransı']],
                    'meal_frequency' => 'Günde 3 Ana Öğün, 2 Ara Öğün',
                ],
                'physical' => [
                    'initial_weight' => 55, 'initial_height' => 168, 'target_weight' => 55, 'goal_type' => GoalTypeEnum::HEALTHY_NUTRITION,
                ],
                'lifestyle' => [
                    'activity_level' => ClientActivityLevelEnum::LIGHT, 'sleep_hours' => 7, 'water_intake' => '2.5 Litre',
                    'smoking_status' => ClientSmokingStatusEnum::NON_SMOKER, 'alcohol_consumption' => ClientAlcoholConsumptionEnum::NONE,
                    'extra_notes' => 'Okulda sürekli hareket halinde.',
                ]
            ],
            [
                'first_name' => 'Emre',
                'last_name' => 'Can',
                'email' => 'emre.can@mail.com',
                'phone' => '05308901234',
                'occupation' => 'Serbest Çalışan Grafiker',
                'age' => 29,
                'gender' => GenderEnum::MALE,
                'status' => ClientStatusEnum::ACTIVE,
                'medical' => [
                    'medical_conditions' => [['medical_conditions' => 'Demir Eksikliği Anemisi']],
                    'medications' => [['medications' => 'Demir Takviyesi (3 ay süreyle)']],
                    'allergies' => [['allergies' => 'Bazı kozmetik ürünler']],
                    'food_allergies' => [['food_allergies' => 'Kivi']],
                    'additional_medical_notes' => 'İlaç takviyesi ile değerleri iyileşme göstermekte. Enerji düşüklüğü yaşayabilir.',
                ],
                'nutrition' => [
                    'favorite_foods' => [['favorite_foods' => 'Pide'], ['favorite_foods' => 'Döner']],
                    'disliked_foods' => [['disliked_foods' => 'Balık (Kokusu rahatsız ediyor)']],
                    'dietary_restrictions' => [['dietary_restrictions' => 'Demir emilimini engelleyecek çay tüketimini azaltma']],
                    'meal_frequency' => 'Günde 3 Ana Öğün',
                ],
                'physical' => [
                    'initial_weight' => 75, 'initial_height' => 185, 'target_weight' => 75, 'goal_type' => GoalTypeEnum::HEALTHY_NUTRITION,
                ],
                'lifestyle' => [
                    'activity_level' => ClientActivityLevelEnum::SEDENTARY, 'sleep_hours' => 8, 'water_intake' => '2 Litre',
                    'smoking_status' => ClientSmokingStatusEnum::NON_SMOKER, 'alcohol_consumption' => ClientAlcoholConsumptionEnum::OCCASIONAL,
                    'extra_notes' => 'Hafta sonları bilgisayar oyunları oynuyor.',
                ]
            ],
            [
                'first_name' => 'Funda',
                'last_name' => 'Tekin',
                'email' => 'funda.tekin@mail.com',
                'phone' => '05449012345',
                'occupation' => 'Finans Analisti',
                'age' => 58,
                'gender' => GenderEnum::FEMALE,
                'status' => ClientStatusEnum::ACTIVE,
                'medical' => [
                    'medical_conditions' => [['medical_conditions' => 'Diyabet (Tip 2, Diyetle kontrol altında)']],
                    'medications' => [['medications' => 'Metformin (Günde iki kez)']],
                    'allergies' => [['allergies' => 'İyot (Kontrast madde)']],
                    'food_allergies' => [['food_allergies' => 'Bal']],
                    'additional_medical_notes' => 'Düzenli kan şekeri takibi yapmaktadır. İlaç dozajı beslenmeye göre ayarlanmıştır.',
                ],
                'nutrition' => [
                    'favorite_foods' => [['favorite_foods' => 'Kuru Baklagiller'], ['favorite_foods' => 'Tam Buğday Ekmeği']],
                    'disliked_foods' => [['disliked_foods' => 'Hazır Meyve Suları'], ['disliked_foods' => 'Beyaz Pirinç']],
                    'dietary_restrictions' => [['dietary_restrictions' => 'Şeker kısıtlamaları'], ['dietary_restrictions' => 'Basit karbonhidrat kısıtlamaları']],
                    'meal_frequency' => 'Günde 6 Öğün (3 Ana, 3 Ara – Kan şekerini dengelemek için)',
                ],
                'physical' => [
                    'initial_weight' => 78, 'initial_height' => 160, 'target_weight' => 75, 'goal_type' => GoalTypeEnum::HEALTHY_NUTRITION,
                ],
                'lifestyle' => [
                    'activity_level' => ClientActivityLevelEnum::LIGHT, 'sleep_hours' => 7, 'water_intake' => '1.8 Litre',
                    'smoking_status' => ClientSmokingStatusEnum::NON_SMOKER, 'alcohol_consumption' => ClientAlcoholConsumptionEnum::NONE,
                    'extra_notes' => 'Her sabah 30 dakika tempolu yürüyüş yapıyor.',
                ]
            ],
            [
                'first_name' => 'Murat',
                'last_name' => 'Şahin',
                'email' => 'murat.sahin@mail.com',
                'phone' => '05330123456',
                'occupation' => 'Elektrik Mühendisi',
                'age' => 41,
                'gender' => GenderEnum::MALE,
                'status' => ClientStatusEnum::ACTIVE,
                'medical' => [
                    'medical_conditions' => [],
                    'medications' => [['medications' => 'Vitamin D Takviyesi (Kış aylarında)']],
                    'allergies' => [],
                    'food_allergies' => [['food_allergies' => 'Ceviz']],
                    'additional_medical_notes' => 'Rutin kontrolleri dışında herhangi bir sağlık problemi yoktur.',
                ],
                'nutrition' => [
                    'favorite_foods' => [['favorite_foods' => 'Köri soslu tavuk'], ['favorite_foods' => 'Pilav']],
                    'disliked_foods' => [['disliked_foods' => 'Sakatat']],
                    'dietary_restrictions' => [],
                    'meal_frequency' => 'Günde 3 Ana Öğün',
                ],
                'physical' => [
                    'initial_weight' => 88, 'initial_height' => 183, 'target_weight' => 83, 'goal_type' => GoalTypeEnum::WEIGHT_LOSS,
                ],
                'lifestyle' => [
                    'activity_level' => ClientActivityLevelEnum::VERY_ACTIVE, 'sleep_hours' => 6.5, 'water_intake' => '3 Litre',
                    'smoking_status' => ClientSmokingStatusEnum::NON_SMOKER, 'alcohol_consumption' => ClientAlcoholConsumptionEnum::OCCASIONAL,
                    'extra_notes' => 'Düzenli olarak futbol ve basketbol oynuyor.',
                ]
            ],
        ];

        foreach ($clientsData as $data) {
            $client = Client::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'status' => $data['status'],
                'age' => $data['age'],
                'occupation' => $data['occupation'],
                'gender' => $data['gender'],
            ]);


            ClientMedicalProfile::create([
                'client_id' => $client->id,
                'medical_conditions' => $data['medical']['medical_conditions'],
                'medications' => $data['medical']['medications'],
                'allergies' => $data['medical']['allergies'],
                'food_allergies' => $data['medical']['food_allergies'],
                'additional_medical_notes' => $data['medical']['additional_medical_notes'],
            ]);


            ClientNutritionProfile::create([
                'client_id' => $client->id,
                'favorite_foods' => $data['nutrition']['favorite_foods'],
                'disliked_foods' => $data['nutrition']['disliked_foods'],
                'dietary_restrictions' => $data['nutrition']['dietary_restrictions'],
                'meal_frequency' => $data['nutrition']['meal_frequency'],
            ]);

            ClientPhysicalProfile::create([
                'client_id' => $client->id,
                'initial_weight' => $data['physical']['initial_weight'],
                'initial_height' => $data['physical']['initial_height'],
                'target_weight' => $data['physical']['target_weight'],
                'goal_type' => $data['physical']['goal_type'],
            ]);


            ClientLifestyleProfile::create([
                'client_id' => $client->id,
                'activity_level' => $data['lifestyle']['activity_level'],
                'sleep_hours' => $data['lifestyle']['sleep_hours'],
                'water_intake' => $data['lifestyle']['water_intake'],
                'smoking_status' => $data['lifestyle']['smoking_status'],
                'alcohol_consumption' => $data['lifestyle']['alcohol_consumption'],
                'extra_notes' => $data['lifestyle']['extra_notes'],
            ]);
        }
    }
}
