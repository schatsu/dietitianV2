<?php

namespace App\Filament\Resources;

use App\Enums\BlogStatusEnum;
use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Exception;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Bloglar';
    protected static ?string $modelLabel = 'Blog';
    protected static ?string $pluralModelLabel = 'Bloglar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Blog Bilgileri')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Başlık')
                                    ->maxLength(255)
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                                        $set("slug", Str::slug($state));
                                    }),

                                Forms\Components\TextInput::make('slug')
                                    ->label('Slug')
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),
                            ]),

                        Forms\Components\Textarea::make('description')
                            ->label('Kısa Açıklama')
                            ->maxLength(255),

                        Forms\Components\RichEditor::make('content')
                            ->label('İçerik')
                            ->columnSpanFull(),

                        Forms\Components\SpatieTagsInput::make('tags')
                            ->type('blog_tags')
                            ->label('Anahtar Kelimeler'),
                    ])
                    ->columns(1)->collapsible(),

                Forms\Components\Section::make('Kategori & Durum')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Forms\Components\Select::make('status')
                                    ->label('Durum')
                                    ->options([
                                        BlogStatusEnum::ACTIVE->value => 'Aktif',
                                        BlogStatusEnum::PASSIVE->value => 'Pasif',
                                        BlogStatusEnum::DRAFT->value => 'Taslak',
                                    ])
                            ]),

                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('order')
                                    ->label('Sıra')
                                    ->numeric(),

                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Öne Çıkar')
                                    ->default(false),
                            ]),
                    ])
                    ->columns(1)->collapsed(),

                Forms\Components\Section::make('Görseller & SEO')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('cover_image')
                            ->label('Kapak Görseli')
                            ->image()
                            ->hint('600x430px')
                            ->collection('blogs')
                            ->mimeTypeMap(['image/jpeg' => 'jpg', 'image/png' => 'png'])
                            ->imageEditor()
                            ->directory('blogs'),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('og_image')
                            ->label('OG Görseli')
                            ->image()
                            ->hint('1200x630px')
                            ->collection('blogs')
                            ->mimeTypeMap(['image/jpeg' => 'jpg', 'image/png' => 'png'])
                            ->imageEditor()
                            ->directory('blogs'),

                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('seo_title')
                                    ->label('SEO Başlığı'),

                                Forms\Components\TextInput::make('seo_description')
                                    ->label('SEO Açıklaması'),

                                Forms\Components\SpatieTagsInput::make('seo_keywords')
                                    ->type('blog_seo_keywords')
                                    ->label('SEO Anahtar Kelimeleri'),
                            ]),
                    ])
                    ->columns(1)->collapsed(),
            ]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('cover_image')
                    ->label('Kapak Resmi')
                    ->circular(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Başlık')
                    ->words(5)
                    ->tooltip(fn($record) => $record->title)
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Açıklama')
                    ->words(5)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->tooltip(fn($record) => $record->description)
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Durum')
                    ->badge()
                    ->formatStateUsing(fn (BlogStatusEnum $state) => $state->label())
                    ->color(fn (BlogStatusEnum $state) => $state->color()),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable(),

                Tables\Columns\TextColumn::make('order')
                    ->label('Sıra')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Öne Çıkarıldı mı?')
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
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                ->label('Durum')
                ->options(BlogStatusEnum::options()),
                SelectFilter::make('is_featured')
                ->label('Öne Çıkarıldı mı?')
                ->options([
                    true => 'Evet',
                    false => 'Hayır'
                ])
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
            ->defaultSort('order')
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
