<?php

namespace App\Filament\Resources\DietProgramResource\Pages;

use App\Filament\Resources\DietProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDietPrograms extends ListRecords
{
    protected static string $resource = DietProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
