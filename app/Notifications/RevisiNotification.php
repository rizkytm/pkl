<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RevisiNotification extends Notification
{
    use Queueable;

    protected $revisi;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($revisi)
    {
        $this->revisi = $revisi;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'revisi' => $this->revisi,
        ];
    }
}
