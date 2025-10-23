<?php

namespace App\Filament\Resources;

use App\Enums\MealUnitEnum;
use App\Filament\Resources\MealResource\Pages;
use App\Filament\Resources\MealResource\RelationManagers;
use App\Models\Meal;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MealResource extends Resource
{
    protected static ?string $model = Meal::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Diyet Programları';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Besinler';
    protected static ?string $modelLabel = 'Besin';
    protected static ?string $pluralModelLabel = 'Besinler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Besin Bilgileri')
                ->schema([
                    Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Besin Adı')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('meal_category_id')
                            ->label('Besin Kategorisi')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('default_quantity')
                            ->label('Besin Miktarı')
                            ->numeric(),
                        Select::make('unit')
                            ->label('Birim')
                            ->options(MealUnitEnum::options())
                            ->required()

                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Besin Adı')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                ->label('Kategori')
                ->searchable(),
                Tables\Columns\TextColumn::make('default_quantity')
                    ->label('Miktar')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unit')
                    ->label('Birim')
                    ->formatStateUsing(fn($state) => $state ? $state->label() : '-')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('O.Tarihi')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('G.Tarihi')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMeals::route('/'),
            'create' => Pages\CreateMeal::route('/create'),
            'edit' => Pages\EditMeal::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
