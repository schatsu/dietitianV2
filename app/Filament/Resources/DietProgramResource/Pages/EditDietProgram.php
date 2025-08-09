<?php

namespace App\Filament\Resources\DietProgramResource\Pages;

use App\Filament\Resources\DietProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDietProgram extends EditRecord
{
    protected static string $resource = DietProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
