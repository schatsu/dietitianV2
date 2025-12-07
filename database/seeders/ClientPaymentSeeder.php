<?php

namespace Database\Seeders;

use App\Enums\ClientPaymentMethodEnum;
use App\Enums\ClientPaymentStatusEnum;
use App\Models\Client;
use App\Models\ClientPayment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ClientPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientMap = Client::pluck('id', 'first_name')->toArray();

        $paymentsData = [

            [
                'client_name' => 'Elif',
                'amount' => 750.00,
                'payment_method' => ClientPaymentMethodEnum::CREDIT_CARD,
                'session_date' => Carbon::parse('2025-12-01'),
                'payment_status' => ClientPaymentStatusEnum::COMPLETED,
                'payment_date' => Carbon::parse('2025-12-01'),
                'notes' => 'Aralık ayı ilk seans ödemesi.',
            ],

            [
                'client_name' => 'Mehmet',
                'amount' => 1200.00,
                'payment_method' => ClientPaymentMethodEnum::BANK_TRANSFER,
                'session_date' => Carbon::parse('2025-11-25'),
                'payment_status' => ClientPaymentStatusEnum::PENDING,
                'payment_date' => null,
                'notes' => 'Kasım toplu paket ödemesi, transfer bekleniyor.',
            ],

            [
                'client_name' => 'Ayşe',
                'amount' => 600.00,
                'payment_method' => ClientPaymentMethodEnum::CASH,
                'session_date' => Carbon::parse('2025-12-05'),
                'payment_status' => ClientPaymentStatusEnum::COMPLETED,
                'payment_date' => Carbon::parse('2025-12-05'),
                'notes' => 'Son seans ödemesi, nakit tahsil edildi.',
            ],

            [
                'client_name' => 'Mustafa',
                'amount' => 800.00,
                'payment_method' => ClientPaymentMethodEnum::OTHER,
                'session_date' => Carbon::parse('2025-12-10'),
                'payment_status' => ClientPaymentStatusEnum::CANCELLED,
                'payment_date' => Carbon::parse('2025-12-08'),
                'notes' => 'Randevu iptali nedeniyle ödeme iadesi yapıldı (Ödeme önce alınmıştı).',
            ],

            [
                'client_name' => 'Zeynep',
                'amount' => 950.00,
                'payment_method' => ClientPaymentMethodEnum::CREDIT_CARD,
                'session_date' => Carbon::parse('2025-11-18'),
                'payment_status' => ClientPaymentStatusEnum::COMPLETED,
                'payment_date' => Carbon::parse('2025-11-17'),
                'notes' => 'Kasım ayı seans ödemesi.',
            ],

            [
                'client_name' => 'Kerem',
                'amount' => 1500.00,
                'payment_method' => ClientPaymentMethodEnum::BANK_TRANSFER,
                'session_date' => Carbon::parse('2025-12-03'),
                'payment_status' => ClientPaymentStatusEnum::COMPLETED,
                'payment_date' => Carbon::parse('2025-12-02'),
                'notes' => '3 seanslık paket ücreti.',
            ],

            [
                'client_name' => 'Selin',
                'amount' => 500.00,
                'payment_method' => ClientPaymentMethodEnum::CREDIT_CARD,
                'session_date' => Carbon::parse('2025-10-20'),
                'payment_status' => ClientPaymentStatusEnum::REFUNDED,
                'payment_date' => Carbon::parse('2025-10-25'),
                'notes' => 'Hizmetten memnun kalmama nedeniyle ücret iadesi.',
            ],

            [
                'client_name' => 'Emre',
                'amount' => 700.00,
                'payment_method' => ClientPaymentMethodEnum::CASH,
                'session_date' => Carbon::parse('2025-12-07'),
                'payment_status' => ClientPaymentStatusEnum::COMPLETED,
                'payment_date' => Carbon::parse('2025-12-07'),
                'notes' => 'Güncel seans ödemesi.',
            ],

            [
                'client_name' => 'Funda',
                'amount' => 1100.00,
                'payment_method' => ClientPaymentMethodEnum::BANK_TRANSFER,
                'session_date' => Carbon::parse('2025-12-15'),
                'payment_status' => ClientPaymentStatusEnum::PENDING,
                'payment_date' => null,
                'notes' => 'Aylık danışmanlık ücreti, vade 15.12.2025.',
            ],

            [
                'client_name' => 'Murat',
                'amount' => 900.00,
                'payment_method' => ClientPaymentMethodEnum::OTHER,
                'session_date' => Carbon::parse('2025-11-01'),
                'payment_status' => ClientPaymentStatusEnum::COMPLETED,
                'payment_date' => Carbon::parse('2025-11-01'),
                'notes' => 'Özel anlaşma ile ödeme tamamlandı.',
            ],
        ];

        foreach ($paymentsData as $data) {
            $clientId = $clientMap[$data['client_name']] ?? null;

            if ($clientId) {
                ClientPayment::create([
                    'client_id' => $clientId,
                    'amount' => $data['amount'],
                    'payment_method' => $data['payment_method'],
                    'session_date' => $data['session_date'],
                    'payment_status' => $data['payment_status'],
                    'payment_date' => $data['payment_date'],
                    'notes' => $data['notes'],
                ]);
            }
        }
    }
}
