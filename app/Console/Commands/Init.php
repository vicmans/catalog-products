<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Run migrations
        $this->info('Running migrations...');
        Artisan::call('migrate:fresh', ['--force' => true]); // Use --force in production
        $this->info('Migrations completed.');

        // Ask if they want to run the seeders
        if ($this->confirm('Would you like to run the seeders?')) {
            Artisan::call('db:seed'); // Use --force in production
            $this->info('Seeders completed.');
        }
        $this->info('Create a new user');

        $this->call('make:filament-user');
    }
}
