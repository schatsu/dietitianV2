<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mail.smtp_host', 'sandbox.smtp.mailtrap.io');
        $this->migrator->add('mail.smtp_port', 2525);
        $this->migrator->add('mail.smtp_username', '693bc4e2bebae8');
        $this->migrator->add('mail.smtp_password', 'aa80cfbfd356d6');
        $this->migrator->add('mail.smtp_from_email', 'hello@diyetisyen.com');
    }
};
