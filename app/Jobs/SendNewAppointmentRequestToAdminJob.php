<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\SendNewAppointmentRequestToAdminNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Zap\Models\Schedule;

class SendNewAppointmentRequestToAdminJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Schedule $appointment)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $adminUsers = User::query()
            ->whereHas('roles', function ($query) {
                $query->where('name', 'super_admin');
            })->get();

        if ($adminUsers->isNotEmpty()) {
            Notification::send($adminUsers, new SendNewAppointmentRequestToAdminNotification($this->appointment));
        }
    }
}
