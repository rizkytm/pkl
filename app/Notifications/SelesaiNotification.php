<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SelesaiNotification extends Notification
{
    use Queueable;

    protected $selesai;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($selesai)
    {
        $this->selesai = $selesai;
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
            'selesai' => $this->selesai,
        ];
    }
}
