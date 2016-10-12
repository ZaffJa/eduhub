<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Models\InstitutionUser;
use App\Models\InstitutionCourse;
use App\Models\Enquiry;

class CustomerEnquiry extends Notification
{
    use Queueable;

    public $user,$enquirer_name,$enquirer_email,$course;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$enquirer_name,$enquirer_email,$course)
    {
        $this->user = $user;
        $this->enquirer_name = $enquirer_name;
        $this->enquirer_email = $enquirer_email;
        $this->course = $course;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->line('Dear '.$this->user.'.')
                    ->line($this->enquirer_name.' has enquire you about '.$this->course.'.')
                    ->line('You can reply about the enquiry at '.$this->enquirer_email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
