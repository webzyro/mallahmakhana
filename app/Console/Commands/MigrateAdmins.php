<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Console\Command;

class MigrateAdmins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-admins';

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
        User::where('is_admin', true)->each(function ($user) {
            Admin::create([
                'name'     => $user->name,
                'email'    => $user->email,
                'password' => $user->password, // already hashed
            ]);
        });

        $this->info('Admins migrated successfully.');
    }
}
