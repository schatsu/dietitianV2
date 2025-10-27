<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Site';
    protected static ?string $navigationLabel = 'Slider';
    protected static ?string $modelLabel = 'Slider';

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Yeni Slider Ekle')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Başlık')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                                        $set("slug", Str::slug($state));
                                    }),
                                Forms\Components\TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->label('Açıklama')
                                    ->columnSpanFull(),
                                Forms\Components\SpatieMediaLibraryFileUpload::make('slider')
                                    ->label('Resim')
                                    ->image()
                                    ->collection('slider')
                                    ->directory('sliders')
                                    ->imageEditor()
                                    ->maxSize(4096)
                                    ->required(),
                                Forms\Components\TextInput::make('link')
                                    ->label('Link')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('order')
                                    ->label('Sıra')
                                    ->required()
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(1),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Durum')
                                    ->required(),
                            ])
                    ])
                ->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('slider')
                    ->circular()
                    ->collection('slider')
                    ->label('Resim'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Başlık')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                    ->label('Link')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Sıra')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Durum')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Oluşturulma T.')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Güncellenme T.')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->reorderable('order')
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
            ])
            ->emptyStateHeading('Henüz slider bulunmuyor')
            ->emptyStateDescription('Yeni sliderlar oluşturuldukça burada görünecektir.')
            ->emptyStateIcon('heroicon-o-photo');
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
