<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MailSettings extends Settings
{
    public string $smtp_host;
    public string $smtp_port;
    public string $smtp_username;
    public string $smtp_password;
    public string $smtp_from_email;

    public static function group(): string
    {
        return 'mail';
    }
}
