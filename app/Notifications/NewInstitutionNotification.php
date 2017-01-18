<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewInstitutionNotification extends Notification
{
    use Queueable;

    private $user;
    private $message;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @param $message
     */
    public function __construct($user,$message)
    {
        //
        $this->user = $user;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello ' . $this->user->name)
                    ->line($this->message)
                    ->line('Thank you for using our application!');
    }

}
