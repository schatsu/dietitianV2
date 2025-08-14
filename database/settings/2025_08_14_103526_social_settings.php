<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('social.facebook', 'https://www.facebook.com/');
        $this->migrator->add('social.x', 'https://x.com/');
        $this->migrator->add('social.instagram', 'https://www.instagram.com/');
        $this->migrator->add('social.linkedin', 'https://www.linkedin.com/');
        $this->migrator->add('social.youtube', 'https://www.youtube.com/');
    }
};
