<?php

namespace App\Jobs;

use App\Models\Subscriber;
use App\Notifications\EmailSubscribed;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWelcomeEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Subscriber $subscriber)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->subscriber->notify(new EmailSubscribed);
    }
}
