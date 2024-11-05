<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InquiryNotification extends Notification
{
    use Queueable;
    public $inquiry, $user_type;

    /**
     * Create a new notification instance.
     */
    public function __construct($inquiry, $user_type)
    {
        $this->inquiry = $inquiry;
        $this->user_type = $user_type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        if ($this->user_type == 'client') {
            return (new MailMessage)
                ->subject('Inquiry Submitted')
                ->greeting('Dear ' . $this->inquiry->name . ',')
                ->line('Thank you for reaching out to us.')
                ->line('We are pleased to confirm that we have successfully received your inquiry. Our team is currently reviewing the details and will respond to your query as soon as possible.')
                ->line('We appreciate your patience and look forward to assisting you.')
                ->line('Inquiry #: ' . $this->inquiry->id);
        }

        if ($this->user_type == 'admin') {
            return (new MailMessage)
                ->subject('New Inquiry Received')
                ->greeting('To ' . config('app.name'). ',')
                ->line('Inquiry #: ' . $this->inquiry->id)
                ->line('Name: ' . $this->inquiry->name)
                ->line('Email: ' . $this->inquiry->email)
                ->line('Phone: ' . $this->inquiry->phone)
                ->line('Message: ' . $this->inquiry->message);
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
