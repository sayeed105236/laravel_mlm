<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCredential extends Notification
{
    use Queueable;
    protected $name;
    protected $user_name;
    protected $email;
    protected $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email_data)
    {
      //dd($email_data);
        $this->email=$email_data['email'];
        $this->name=$email_data['name'];
        $this->user_name=$email_data['user_name'];
        $this->password=$email_data['password'];
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

        /*return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');*/

        return (new MailMessage())
            ->subject('Account Credentials')
            ->from('noreply@mlm.com', 'mlm')
            ->view('emails.user-password', ['name' => $notifiable->name,'user_name' => $notifiable->user_name, 'user_password' => $this->password]);
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
