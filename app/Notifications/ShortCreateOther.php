<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ShortCreateOther extends Notification
{
    use Queueable;
    public $name,$field,$id;

    /**
     * Create a new notification instance.
     *
     * @param $name
     * @param $field
     * @param $id
     */
    public function __construct($name,$field,$id)
    {
        $this->name = $name;
        $this->field = $field;
        $this->id = $id;
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
                    ->line('A user named '.$this->name.' with id '.$this->id.' has created a new field name '.$this->field.'.')
                    ->line('If the field name '.$this->field.' is acceptable you may ignore this message');
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'A user named '.$this->name.' with id '.$this->id.' has created a new field name '.$this->field.'.',
        ];
    }
}
