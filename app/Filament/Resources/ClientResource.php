<?php

namespace App\Filament\Resources;

use App\Enums\ClientStatusEnum;
use App\Enums\GenderEnum;
use App\Enums\GoalTypeEnum;
use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Danışan';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Danışanlar';
    protected static ?string $modelLabel = 'Danışan';
    protected static ?string $pluralModelLabel = 'Danışan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Genel Bilgiler')
                    ->schema([
                        Forms\Components\Section::make('Danışan Bilgileri')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('first_name')
                                            ->required()
                                            ->label('Ad')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('last_name')
                                            ->label('Soyad')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('email')
                                            ->label('E-posta')
                                            ->email()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Telefon')
                                            ->mask('(999) 999 99 99')
                                            ->tel()
                                            ->maxLength(20),
                                        Forms\Components\Select::make('status')
                                            ->label('Durum')
                                            ->options(ClientStatusEnum::labels()),
                                        Forms\Components\TextInput::make('age')
                                            ->label('Yaş')
                                            ->numeric(),
                                        Forms\Components\TextInput::make('occupation')
                                            ->label('Meslek')
                                            ->maxLength(100),
                                        Forms\Components\Select::make('gender')
                                            ->label('Cinsiyet')
                                            ->options(GenderEnum::labels())
                                    ])
                            ])->collapsible()
                    ]),
                    Forms\Components\Wizard\Step::make('Fiziksel Bilgiler')
                        ->schema([
                            Forms\Components\Section::make('Fiziksel Bilgiler')
                                ->relationship('physicalProfile')
                                ->schema([
                                    Forms\Components\Grid::make()
                                        ->schema([
                                            Forms\Components\TextInput::make('initial_height')
                                                ->label('Mevcut Boy')
                                                ->prefix('cm')
                                                ->required()
                                                ->numeric(),
                                            Forms\Components\TextInput::make('initial_weight')
                                                ->label('Mevcut Kilo')
                                                ->prefix('kg')
                                                ->required()
                                                ->numeric(),
                                            Forms\Components\TextInput::make('target_weight')
                                                ->label('Hedef Kilo')
                                                ->prefix('kg')
                                                ->required()
                                                ->numeric(),
                                            Forms\Components\Select::make('goal_type')
                                                ->label('Diyet Tipi')
                                                ->required()
                                                ->options(GoalTypeEnum::options()),
                                        ]),
                                ]),
                        ]),

                    Forms\Components\Wizard\Step::make('Tıbbi Bilgiler')
                    ->schema([

                    ]),
                    Forms\Components\Wizard\Step::make('Yaşam Tarzı')
                    ->schema([

                    ]),
                    Forms\Components\Wizard\Step::make('Beslenme Alışkanlıkları')
                    ->schema([

                    ]),
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Ad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label('Soyad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('E-posta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Telefon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Durum')
                    ->formatStateUsing(fn (ClientStatusEnum $state) => $state->label())
                    ->badge()
                    ->color(fn (ClientStatusEnum $state) => $state->color()),
                Tables\Columns\TextColumn::make('age')
                    ->label('Yaş')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('occupation')
                    ->label('Meslek')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Cinsiyet')
                    ->formatStateUsing(fn (GenderEnum $state) => $state->label())
                    ->badge()
                    ->color(fn (GenderEnum $state) => $state->color()),
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
