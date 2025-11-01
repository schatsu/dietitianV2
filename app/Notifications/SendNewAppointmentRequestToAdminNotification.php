<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class SendNewAppointmentRequestToAdminNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Appointment $appointment) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $slot = $this->appointment->slot;

        $formattedDate = $slot
            ? Carbon::parse($slot->date)->translatedFormat('d F Y')
            : $this->appointment->created_at->translatedFormat('d F Y');

        $formattedTime = $slot?->start_time ? Carbon::parse($slot->start_time)->format('H:i') : null;

        return (new MailMessage)
            ->subject('🎉 Yeni Randevu Talebi Geldi')
            ->greeting('Merhaba 👋 Admin,')
            ->line('Yeni bir randevu talebi oluşturuldu:')
            ->line('**Ad Soyad:** ' . $this->appointment->name)
            ->line('**E-posta:** ' . $this->appointment->email)
            ->when($formattedTime, fn($msg) => $msg->line("**Randevu Tarihi:** {$formattedDate} - {$formattedTime}"))
            ->unless($formattedTime, fn($msg) => $msg->line("**Randevu Tarihi:** {$formattedDate}"))
            ->line('**Mesaj:**')
            ->line('"' . ($this->appointment->message ?? '-') . '"')
            ->action('Admin Paneli Aç', config('app.url') . '/admin')
            ->line('📅 Lütfen randevuyu admin panelinizden kontrol edin.');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
