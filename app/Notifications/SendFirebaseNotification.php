<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmMessage;

class SendFirebaseNotification extends Notification
{
    use Queueable;

    private $title;
    private $body;

    public function __construct($title, $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    public function via($notifiable)
    {
        return ['fcm'];
    }

    public function toFcm($notifiable)
    {
        return (new FcmMessage())
            ->content([
                'title' => $this->title,
                'body' => $this->body,
                'sound' => '', // Optional
            ])
            ->data([
                'custom_key' => 'custom_value',
            ]); // Optional
    }

    public function toArray($notifiable)
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
        ];
    }
}
