<?php

namespace App\Jobs;

use App\Models\DietProgram;
use App\Notifications\DietProgramSharedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendDietProgramEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public function __construct(
        public DietProgram $dietProgram,
        public string $email,
        public array $tableData
    ) {}

    public function handle(): void
    {
        Mail::send('emails.diet-program', [
            'dietProgram' => $this->dietProgram,
            'tableData' => $this->tableData,
        ], function ($message) {
            $message->to($this->email)
                ->subject('Diyet Programınız: ' . $this->dietProgram->name);
        });

        if ($this->dietProgram->client) {
            $this->dietProgram->client->notify(
                new DietProgramSharedNotification($this->dietProgram, 'email', $this->email)
            );
        }
    }
}
