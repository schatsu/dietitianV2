<?php

namespace App\Filament\Pages;

use App\Settings\MailSettings;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageMailSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Site Ayarları';
    protected static ?int $navigationSort = 3;
    protected static ?string $title = 'Mail';
    protected static ?string $navigationLabel = 'Mail';

    protected static string $settings = MailSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Mail Ayarları')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('smtp_host')
                                    ->required()
                                    ->label('Smtp Host'),
                                Forms\Components\TextInput::make('smtp_port')
                                    ->required()
                                    ->label('Smtp Port'),
                                Forms\Components\TextInput::make('smtp_username')
                                    ->required()
                                    ->label('Smtp Kullanıcı Adı'),
                                Forms\Components\TextInput::make('smtp_password')
                                    ->required()
                                    ->label('Smtp Kullanıcı Şifre'),
                                Forms\Components\TextInput::make('smtp_from_email')
                                    ->required()
                                    ->email()
                                    ->label('Smtp Kullanıcı Mail'),
                            ])
                    ])
            ]);
    }
}
