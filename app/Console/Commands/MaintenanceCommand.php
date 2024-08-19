<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PendingPostNotification;

class MaintenanceCommand extends Command
{
    protected $signature = 'app:maintenance';

    protected $description = 'Runs System Maintenance tasks';

    public function handle()
    {
        // cleanup old pending notification logs
        $this->info('Cleaning up old pending notification logs...');

        // assuming we want to keep logs for 7 days
        PendingPostNotification::where('sent_at', '<', now()->subDays(7))->delete();
    }
}
