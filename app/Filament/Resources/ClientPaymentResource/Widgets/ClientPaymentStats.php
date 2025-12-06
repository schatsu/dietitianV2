<?php

namespace App\Filament\Resources\ClientPaymentResource\Widgets;

use App\Enums\ClientPaymentStatusEnum;
use App\Models\ClientPayment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class ClientPaymentStats extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        $baseQuery = ClientPayment::query()
            ->where('payment_status', ClientPaymentStatusEnum::COMPLETED);

        $dailyEarnings = (clone $baseQuery)
            ->whereDate('payment_date', Carbon::today())
            ->sum('amount');

        $weeklyEarnings = (clone $baseQuery)
            ->whereBetween('payment_date', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->sum('amount');

        $monthlyEarnings = (clone $baseQuery)
            ->whereMonth('payment_date', Carbon::now()->month)
            ->whereYear('payment_date', Carbon::now()->year)
            ->sum('amount');

        $totalEarnings = (clone $baseQuery)->sum('amount');

        return [
            Stat::make('Günlük Kazanç', number_format($dailyEarnings, 2, ',', '.') . ' ₺')
                ->description('Bugünün tahsilatları')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make('Haftalık Kazanç', number_format($weeklyEarnings, 2, ',', '.') . ' ₺')
                ->description('Bu haftanın toplamı')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),

            Stat::make('Aylık Kazanç', number_format($monthlyEarnings, 2, ',', '.') . ' ₺')
                ->description('Bu ayın toplamı')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('primary'),

            Stat::make('Toplam Kazanç', number_format($totalEarnings, 2, ',', '.') . ' ₺')
                ->description('Tüm zamanların geliri')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('warning'),
        ];
    }
}
