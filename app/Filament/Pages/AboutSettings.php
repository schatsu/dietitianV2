<?php

namespace App\Filament\Pages;

use App\Models\About;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Illuminate\Support\Str;

class AboutSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.pages.about-settings';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 1;

    protected static ?string $title = 'Hakkımda';
    protected static ?string $navigationLabel = 'Hakkımda';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public ?array $data = [];
    public About $about;

    public function mount(): void
    {
        $this->about = About::query()->firstOrCreate([], [
            'title' => '',
            'slug' => '',
            'content' => '',
            'highlights' => ''
        ]);

        $formData = $this->about->toArray();

        if ($this->about->hasMedia('about')) {
            $formData['about'] = $this->about->getMedia('about')->pluck('id')->toArray();
        }

        $this->form->model($this->about)->fill($formData);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Wizard::make([
                Step::make('Genel Bilgiler')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Grid::make()
                            ->schema([
                                TextInput::make('title')
                                    ->label('Başlık')
                                    ->live(onBlur: true)
                                    ->required()
                                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                                        $set('slug', Str::slug($state));
                                    })
                                    ->maxLength(255),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->maxLength(255),

                                RichEditor::make('content')
                                    ->label('İçerik')
                                    ->required()
                                    ->toolbarButtons([
                                        'attachFiles',
                                        'blockquote',
                                        'bold',
                                        'bulletList',
                                        'codeBlock',
                                        'h1',
                                        'h2',
                                        'h3',
                                        'italic',
                                        'link',
                                        'orderedList',
                                        'redo',
                                        'strike',
                                        'underline',
                                        'undo',
                                    ])
                                    ->columnSpanFull(),
                            ]),
                    ]),
                Step::make('Öne Çıkan Bilgiler')
                    ->icon('heroicon-o-star')
                    ->schema([
                        Repeater::make('highlights')
                            ->label('Öne Çıkan Bilgiler')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Başlık')
                                    ->required(),

                                TextInput::make('subtitle')
                                    ->label('Alt Başlık')
                                    ->required(),

                                IconPicker::make('icon')
                                    ->label('İkon')
                                    ->sets(['heroicons', 'phosphor-icons', 'tabler-icons', 'blade-icons'])
                                    ->required(),
                            ])
                            ->collapsible()
                            ->reorderable()
                            ->columnSpanFull()
                            ->reactive()
                            ->addActionLabel('Yeni Bilgi Ekle')
                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? null),
                    ]),
                Step::make('Kapak Görseli')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('about')
                            ->label('Kapak Görseli')
                            ->image()
                            ->hint('1000x751')
                            ->collection('about')
                            ->mimeTypeMap(['image/jpeg' => 'jpg', 'image/png' => 'png'])
                            ->imageEditor()
                            ->directory('about')
                            ->columnSpanFull(),
                    ]),
            ])
                ->skippable()
        ])->statePath('data')
            ->model($this->about);
    }

    public function save(): void
    {
        $state = $this->form->getState();

        $this->about->update($state);

        $this->form->model($this->about)->saveRelationships();

        Notification::make()
            ->title('Hakkımda Güncellendi!')
            ->success()
            ->send();
        $this->mount();
    }
}
