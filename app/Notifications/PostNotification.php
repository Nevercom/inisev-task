<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private readonly Post $post)
    {
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("New Post published for {$this->post->website->name}")
            ->line($this->post->title)
            ->line($this->post->description);
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
