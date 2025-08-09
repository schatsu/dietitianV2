<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DietProgramResource\Pages;
use App\Filament\Resources\DietProgramResource\RelationManagers;
use App\Models\DietProgram;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DietProgramResource extends Resource
{
    protected static ?string $model = DietProgram::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Danışan';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Diyet Programları';
    protected static ?string $modelLabel = 'Diyet Programı';
    protected static ?string $pluralModelLabel = 'Diyet Programı';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDietPrograms::route('/'),
            'create' => Pages\CreateDietProgram::route('/create'),
            'edit' => Pages\EditDietProgram::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
