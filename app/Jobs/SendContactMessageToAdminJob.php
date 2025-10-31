<?php

namespace App\Jobs;

use App\Models\ContactMessage;
use App\Models\User;
use App\Notifications\SendContactMessageToAdminNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendContactMessageToAdminJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public ContactMessage $message)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $adminUsers = User::whereHas('roles', function($query) {
            $query->where('name', 'super_admin');
        })->get();

        if ($adminUsers->isNotEmpty()) {
            Notification::send($adminUsers, new SendContactMessageToAdminNotification($this->message));
        }
    }
}
