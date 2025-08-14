<?php

namespace App\Filament\Pages;

use App\Settings\SiteSettings;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageSiteSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Site Ayarları';
    protected static ?int $navigationSort = 1;
    protected static ?string $title = 'Genel';
    protected static ?string $navigationLabel = 'Genel';

    protected static string $settings = SiteSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Site Ayarları')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('site_name')
                                    ->required()
                                    ->label('Site Adı'),
                                Forms\Components\TextInput::make('site_email')
                                    ->required()
                                    ->label('Site Email'),
                                Forms\Components\TextInput::make('site_phone')
                                    ->label('Site Telefon')
                                    ->mask('(999) 999 99 99')
                                    ->prefix('+90'),
                                FileUpload::make('site_logo')
                                    ->required()
                                    ->label('Site Logo')
                                    ->image()
                                    ->maxSize(1024)
                                    ->directory('logos'),
                                FileUpload::make('site_favicon')
                                    ->required()
                                    ->label('Site Favicon')
                                    ->maxSize(1024)
                                    ->image()
                                    ->directory('favicons'),
                            ])
                    ])
            ]);
    }
}
