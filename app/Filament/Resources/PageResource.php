<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;
    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Sayfa Yönetimi';
    protected static ?string $modelLabel = 'Sayfa';
    protected static ?string $pluralModelLabel = 'Sayfalar';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Sayfa Bilgileri')
                    ->schema([
                        Forms\Components\Grid::make(2)
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
                                    ->label( 'Slug')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                        RichEditor::make('content')
                            ->label('İçerik')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('order')
                                    ->label('Sıra')
                                    ->default(1)
                                    ->minValue(1)
                                    ->numeric(),
                                Forms\Components\Select::make('status')
                                ->label('Durum')
                                ->options([
                                    true => 'Aktif',
                                    false => 'Pasif',
                                ]),
                            ]),
                    ])
                    ->collapsible(),

                Forms\Components\Section::make('SEO Ayarları')
                    ->collapsed()
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('seo_title')
                                    ->label('SEO Başlığı')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('seo_keywords')
                                    ->label('SEO Anahtar Kelimeler')
                                    ->maxLength(255),
                            ]),
                        Forms\Components\Textarea::make('seo_description')
                            ->label('SEO Açıklaması')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Başlık')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Sıra')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Durum')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Oluşturulma')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Güncellenme')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()->label('Düzenle'),
                Tables\Actions\DeleteAction::make()->label('Sil'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Seçilenleri Sil'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
