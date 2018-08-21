<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RevisiDoneNotification extends Notification
{
    use Queueable;

    protected $revisidone;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($revisidone)
    {
        $this->revisidone = $revisidone;
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
            'revisidone' => $this->revisidone,
        ];
    }
}
