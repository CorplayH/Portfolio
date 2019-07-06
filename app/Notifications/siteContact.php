<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class siteContact extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $name;
    protected $email;
    protected $message;
    public function __construct($requset)
    {
        $this->name = $requset->name;
        $this->email = $requset->email;
        $this->message = $requset->message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->replyTo($this->email)
            ->subject('Website Message from '.$this->name)
            ->line('Hi you have a message from  * '.$this->name.' *')
            ->line('***')
            ->line($this->message)
            ->line('***')
            ->line('You can directly reply this email to * '.$this->name.' *  or')
            ->action('Click here to reply','mailto:'.$this->email)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
