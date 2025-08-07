<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Kullanıcı Yönetimi';
    protected static ?int $navigationSort = 1;
    protected static ?string $label = 'Kullanıcı';
    protected static ?string $pluralLabel = 'Kullanıcılar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Kullanıcı Bilgileri')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('name')
                            ->label('Ad Soyad')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('E-posta')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        DateTimePicker::make('email_verified_at')
                            ->placeholder(now())
                            ->locale('tr')
                            ->timezone('Europe/Istanbul')
                            ->defaultFocusedDate(now())
                            ->native(false)
                            ->format('Y-m-d H:i:s')
                            ->label('E-posta Doğrulama Tarihi'),

                        TextInput::make('password')
                            ->label('Şifre')
                            ->password()
                            ->revealable()
                            ->maxLength(255)
                            ->autocomplete('new-password')
                            ->required(fn (string $context): bool => $context === 'create')
                            ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                            ->dehydrated(fn ($state) => filled($state)),


                        Select::make('roles')
                            ->label('Roller')
                            ->relationship('roles', 'name')
                            ->searchable()
                            ->preload()
                            ->options(function () {
                                $query = \Spatie\Permission\Models\Role::query();
                                if (!auth()->user()->hasRole('super_admin')) {
                                    $query->where('name', '!=', 'super_admin');
                                }
                                return $query->pluck('name', 'id');
                            }),
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Ad Soyad')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-posta')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label('E-posta Doğrulama')
                    ->dateTime('d.m.Y H:i')
                    ->timezone('Europe/Istanbul')
                    ->sortable(),

                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Roller')
                    ->badge()
                    ->separator(', ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Oluşturulma')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Güncellenme')
                    ->since()
                    ->sortable(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->when(!auth()->user()->hasRole('super_admin'), function ($query) {
                $query->where('email', '!=', 'admin@example.com');
            });
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
