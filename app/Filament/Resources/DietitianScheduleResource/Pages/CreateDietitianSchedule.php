<?php

namespace App\Filament\Resources\DietitianScheduleResource\Pages;

use App\Filament\Resources\DietitianScheduleResource;
use App\Models\User;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Zap\Facades\Zap;

class CreateDietitianSchedule extends CreateRecord
{
    protected static string $resource = DietitianScheduleResource::class;

    protected static ?string $title = 'Yeni Takvim Oluştur';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        $dietitian = User::role('super_admin')->first();

        $scheduleBuilder = Zap::for($dietitian)
            ->named($data['name']);

        if ($data['schedule_type'] === 'availability') {
            $scheduleBuilder->availability();
        } else {
            $scheduleBuilder->blocked();
        }

        $scheduleBuilder->from($data['start_date']);

        if (!empty($data['end_date'])) {
            $scheduleBuilder->to($data['end_date']);
        }

        $frequencyValue = $data['frequency'] ?? 'weekly';
        if ($frequencyValue instanceof \BackedEnum) {
            $frequencyValue = $frequencyValue->value;
        } elseif (is_object($frequencyValue) && property_exists($frequencyValue, 'value')) {
            $frequencyValue = $frequencyValue->value;
        }

        if ($data['is_recurring'] ?? false) {
            $days = $data['frequency_config']['days'] ?? ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
            $scheduleBuilder->weekly($days);
        }

        if (!empty($data['periods_data'])) {
            foreach ($data['periods_data'] as $period) {
                $startTime = Carbon::parse($period['start_time'])->format('H:i');
                $endTime = Carbon::parse($period['end_time'])->format('H:i');
                $scheduleBuilder->addPeriod($startTime, $endTime);
            }
        }

        if ($data['schedule_type'] === 'availability') {
            $metadata = $data['metadata'] ?? [];
            $scheduleBuilder->withMetadata([
                'session_duration' => (int) ($metadata['session_duration'] ?? 45),
                'buffer_time' => (int) ($metadata['buffer_time'] ?? 15),
            ]);
        }

        $schedule = $scheduleBuilder->save();

        if (!($data['is_active'] ?? true)) {
            $schedule->update(['is_active' => false]);
        }

        return $schedule;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
