<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public string $site_name;
    public string $site_email;
    public ?string $site_phone;
    public ?string $site_logo;
    public ?string $site_favicon;

    public static function group(): string
    {
        return 'general';
    }
}
