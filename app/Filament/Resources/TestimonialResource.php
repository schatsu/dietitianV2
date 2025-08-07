<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use App\View\Components\Filament\Forms\Components\RatingStar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationLabel = 'Danışan Yorumları';
    protected static ?string $modelLabel = 'Danışan Yorumu';
    protected static ?string $pluralModelLabel = 'Danışan Yorumları';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Yorum Bilgileri')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('client_name')
                                    ->label('Danışan Adı')
                                    ->required(),
                                Forms\Components\TextInput::make('order')
                                    ->label('Sıra')
                                    ->numeric()
                                    ->nullable(),
                                RatingStar::make('rating')
                                    ->label('Puan')
                                    ->stars(5)
                                    ->default(0),
                                Forms\Components\Select::make('status')
                                    ->label('Durum')
                                    ->options([
                                        true => 'Aktif',
                                        false => 'Pasif',
                                    ]),
                                Forms\Components\Textarea::make('review')
                                    ->label('Yorum')
                                    ->required()->columnSpanFull(),
                            ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_name')->label('Danışan')->searchable(),
                TextColumn::make('review')->label('Yorum')->searchable(),
                ViewColumn::make('rating')
                    ->label('Puan')
                    ->view('filament.tables.columns.rating-star')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')->label('Durum')->boolean(),
                TextColumn::make('order')->label('Sıra')->sortable(),
            ])
            ->defaultSort('order' )
            ->reorderable('order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('Seçilenleri Sil'),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
