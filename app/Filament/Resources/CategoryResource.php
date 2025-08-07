<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Kategoriler';
    protected static ?string $modelLabel = 'Kategori';
    protected static ?string $pluralModelLabel = 'Kategoriler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Kategori Bilgileri')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Kategori Adı')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                                        $set("slug", Str::slug($state));
                                    }),
                                Forms\Components\TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->label('Açıklama')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('order')
                                    ->label('Sıra')
                                    ->numeric(),
                                Forms\Components\Select::make('parent_id')
                                    ->label('Üst Kategori')
                                    ->relationship(
                                        name: 'parent',
                                        titleAttribute: 'name',
                                        modifyQueryUsing: function (Builder $query, ?Model $record): Builder {
                                            if ($record && $record->id) {
                                                $query->where('id', '!=', $record->id);
                                            }
                                            return $query;
                                        }
                                    )
                                    ->searchable()
                                    ->preload()
                                    ->placeholder('Ana kategori seçin'),
                                Forms\Components\Toggle::make('status')
                                    ->label('Yayında mı?')
                                    ->required(),
                            ]),
                    ])
                    ->collapsible()
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Kategori Adı')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Sıra')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Yayında mı?')
                    ->boolean(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Üst Kategori')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state ?? 'Yok')
                    ->color(fn($state): string => match (true) {
                        blank($state) => 'danger',
                        filled($state) => 'success',
                    })
                    ->sortable(),
            ])->defaultSort('order')
            ->reorderable('order')
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Düzenle'),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Seçilenleri Sil'),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
