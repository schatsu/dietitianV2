<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Zap\Models\Schedule;

class SendNewAppointmentRequestToAdminNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Schedule $appointment) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $metadata = $this->appointment->metadata ?? [];
        $period = $this->appointment->periods->first();

        $formattedDate = $period
            ? Carbon::parse($period->date)->translatedFormat('d F Y')
            : $this->appointment->created_at->translatedFormat('d F Y');

        $formattedTime = $period?->start_time
            ? Carbon::parse($period->start_time)->format('H:i')
            : null;

        $clientName = $metadata['client_name'] ?? 'Bilinmiyor';
        $clientEmail = $metadata['client_email'] ?? 'Bilinmiyor';
        $clientNote = $metadata['note'] ?? '-';

        return (new MailMessage)
            ->subject('🎉 Yeni Randevu Talebi Geldi')
            ->greeting('Merhaba 👋 Admin,')
            ->line('Yeni bir randevu talebi oluşturuldu:')
            ->line('**Ad Soyad:** ' . $clientName)
            ->line('**E-posta:** ' . $clientEmail)
            ->when($formattedTime, fn($msg) => $msg->line("**Randevu Tarihi:** {$formattedDate} - {$formattedTime}"))
            ->unless($formattedTime, fn($msg) => $msg->line("**Randevu Tarihi:** {$formattedDate}"))
            ->line('**Mesaj:**')
            ->line('"' . $clientNote . '"')
            ->action('Admin Paneli Aç', config('app.url') . '/admin')
            ->line('📅 Lütfen randevuyu admin panelinizden kontrol edin.');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}

