<?php

namespace App\Console\Commands;

use App\Mail\Newsletter;
use App\Models\Product;
use App\Models\Subscriber;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:newsletter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send newsletter to subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subscribers = Subscriber::all(); // Cambiar aquí
        $featuredProducts = Product::featured()->get();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new Newsletter($featuredProducts));
        }

        $this->info('Newsletter sent successfully.');
    }
}
