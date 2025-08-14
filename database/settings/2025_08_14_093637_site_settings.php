<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Demo Diyetisyen');
        $this->migrator->add('general.site_email', 'hello@diyetisyen.com');
        $this->migrator->add('general.site_phone', '0555 555 55 55');
        $this->migrator->add('general.site_logo', 'logo.png');
        $this->migrator->add('general.site_favicon', 'favicon.png');
    }
};
