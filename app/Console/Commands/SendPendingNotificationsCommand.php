<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PendingPostNotification;
use App\Notifications\PostNotification;

class SendPendingNotificationsCommand extends Command
{
    protected $signature = 'notifications:send';

    protected $description = 'Send Pending Notifications';

    public function handle()
    {
        $pendingNotifications = PendingPostNotification::whereNull('sent_at')->get();

        $pendingNotifications->each(function ($notification) {
            $notification->user->notify(new PostNotification($notification->post));
            $notification->update(['sent_at' => now()]);
        });
    }
}
