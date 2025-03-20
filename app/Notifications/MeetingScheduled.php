<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Meeting;

class MeetingScheduled extends Notification implements ShouldQueue
{
    use Queueable;
    protected $meeting;

    /**
     * Create a new notification instance.
     */
    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Meeting Scheduled: ' . $this->meeting->title)
            ->line('A new meeting has been scheduled.')
            ->line('Title: ' . $this->meeting->title)
            ->line('Date: ' . $this->meeting->start_time->format('Y-m-d H:i'))
            ->line('Location: ' . $this->meeting->location)
            ->action('View Meeting', url('/meetings/' . $this->meeting->id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'meeting_id' => $this->meeting->id,
            'title' => $this->meeting->title,
            'start_time' => $this->meeting->start_time,
            'location' => $this->meeting->location,
        ];
    }
}
