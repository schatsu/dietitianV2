<?php

namespace App\Settings;


use Spatie\LaravelSettings\Settings;

class SocialSettings extends Settings
{
    public ?string $facebook;
    public ?string $x;
    public ?string $instagram;
    public ?string $linkedin;
    public ?string $youtube;

    public static function group(): string
    {
        return 'social';
    }
}
