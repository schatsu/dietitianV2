<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource\RelationManagers;
use App\Models\Faq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationGroup = 'Site';

    protected static ?string $navigationLabel = 'SSS Yönetimi';
    protected static ?string $modelLabel = 'Sıkça Sorulan Soru';
    protected static ?string $pluralModelLabel = 'SSS';
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Soru & Cevap')
                    ->schema([
                        Forms\Components\TextInput::make('question')
                            ->label('Soru')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('answer')
                            ->label('Cevap')
                            ->required()
                            ->columnSpanFull(),
                    ])->collapsible(),
                Forms\Components\Section::make('Ayarlar')
                    ->schema([
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\TextInput::make('order')
                                ->label('Sıra')
                                ->numeric(),
                            Forms\Components\Select::make('status')
                                ->label('Durum')
                                ->options([
                                    true => 'Aktif',
                                    false => 'Pasif',
                                ]),
                        ]),
                    ])->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label('Soru')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Durum')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Sıra')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Oluşturulma')
                    ->dateTime()
                    ->sortable(),
            ])
            ->reorderable('order')
            ->defaultSort('order')
            ->actions([
                Tables\Actions\EditAction::make()->label('Düzenle'),
                Tables\Actions\DeleteAction::make()->label('Sil'),
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
