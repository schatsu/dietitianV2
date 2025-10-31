<?php

namespace App\Notifications;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendContactMessageToAdminNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(ContactMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        return (new MailMessage)
            ->subject('🎉 Yeni İletişim Mesajınız Var')
            ->greeting('Merhaba Admin!')
            ->line('İletişim kutunuza yeni bir mesaj geldi.')
            ->line('**Ad Soyad:** ' . $this->message->name)
            ->line('**E-posta:** ' . $this->message->email)
            ->line('**Tarih:** ' . $this->message->created_at->translatedFormat('d.m.Y H:i'))
            ->line('**Mesaj:**')
            ->line('"' . $this->message->message . '"')
            ->action('Admin Panel', config('app.url') . '/admin');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
