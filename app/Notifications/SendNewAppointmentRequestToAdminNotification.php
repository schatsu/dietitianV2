<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNewAppointmentRequestToAdminNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Appointment $appointment)
    {

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
            ->subject('🎉 Yeni Randevu Talebiniz Var')
            ->greeting('Merhaba Admin!')
            ->line('Yeni bir randevu talebili geldi geldi.')
            ->line('**Ad Soyad:** ' . $this->appointment->name)
            ->line('**E-posta:** ' . $this->appointment->email)
            ->line('**Tarih:** ' . $this->appointment->created_at->translatedFormat('d.m.Y H:i'))
            ->line('**Yorum:**')
            ->line('"' . $this->appointment->message . '"')
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
