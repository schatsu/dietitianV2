<?php

namespace App\Notifications;

use App\Models\DietProgram;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DietProgramSharedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public DietProgram $dietProgram,
        public string $method,
        public string $recipient
    ) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Diyet Programı Paylaşıldı')
            ->line("'{$this->dietProgram->name}' isimli diyet programı paylaşıldı.")
            ->line("Paylaşım Yöntemi: " . $this->getMethodLabel())
            ->line("Alıcı: {$this->recipient}")
            ->action('Programı Görüntüle', url("/diet-programs/{$this->dietProgram->id}"))
            ->line('Teşekkür ederiz!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'diet_program_id' => $this->dietProgram->id,
            'diet_program_name' => $this->dietProgram->name,
            'method' => $this->method,
            'recipient' => $this->recipient,
            'shared_at' => now()->toDateTimeString(),
        ];
    }

    private function getMethodLabel(): string
    {
        return match($this->method) {
            'email' => 'E-posta',
            'whatsapp' => 'WhatsApp',
            'pdf' => 'PDF İndirme',
            default => 'Bilinmeyen'
        };
    }
}
