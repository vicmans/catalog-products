<?php

namespace App\Console\Commands;

use App\Models\User;
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

        $name = $this->ask('Enter the name for the new user');

        // Ask for email and password to create a new user
        $email = $this->ask('Enter the email for the new user');
        
        // Validate if the email already exists
        if (User::where('email', $email)->exists()) {
            $this->error('The email is already in use. Please choose another one.');
            return;
        }

        $password = $this->secret('Enter the password for the new user');

        // Create the user
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $this->info('User created successfully.');
    }
}
