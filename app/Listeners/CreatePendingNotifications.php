<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Models\PendingPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatePendingNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostPublished $event): void
    {
        $post = $event->post;
        $subscribers = $post->website->subscribers->map(function ($subscriber) use ($post) {
            return [
                'user_id' => $subscriber->user_id,
                'post_id' => $post->id,
            ];
        })->toArray();

        PendingPostNotification::create($subscribers);
    }
}
