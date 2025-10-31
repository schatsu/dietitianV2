<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Filament\Resources\ContactMessageResource\RelationManagers;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationLabel = 'İletişim Mesajları';
    protected static ?string $modelLabel = 'İletişim Mesajı';
    protected static ?string $pluralModelLabel = 'İletişim Mesajları';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Mesaj Bilgileri')
                ->schema([
                    Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Ad Soyad'),
                        Forms\Components\TextInput::make('email')
                            ->label('E-Posta'),
                        Forms\Components\TextInput::make('phone')
                            ->label('Telefon'),
                        Forms\Components\Textarea::make('message')
                            ->label('Mesaj'),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Ad')
                ->searchable(),
                Tables\Columns\TextColumn::make('email')
                ->label('E-posta')
                ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                ->label('Telefon'),
                Tables\Columns\TextColumn::make('message')
                ->label('Mesaj'),
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
            Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListContactMessages::route('/'),
//            'create' => Pages\CreateContactMessage::route('/create'),
//            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
