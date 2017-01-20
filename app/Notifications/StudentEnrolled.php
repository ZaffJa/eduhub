<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StudentEnrolled extends Notification
{
    use Queueable;
    private $user;
    private $institution;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @param $institution
     */
    public function __construct($user,$institution)
    {
        $this->user = $user;
        $this->institution = $institution;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello Eduhub.')
                    ->line('A new student has been confirmed enrolled at ')
                    ->line($this->institution->name)
                    ->line('Please proceed with the payment as soon as possible. Below is the detail of the student.')
                    ->line('Name  : '.$this->user->name)
                    ->line('Email : '.$this->user->email);
//                    ->line('Phone : '. isset($this->user->student) ? $this->user->student->phone : null);
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->user->name . ' has been confirmed enrolled at ' . $this->institution->name
                      . '. Please confirmed the payment as soon as possible.',
            'data' => $this->user
        ];
    }
}
