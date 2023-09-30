<?php

namespace App\Notifications\Seller;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Cache;

class NewOrder extends Notification
{
    use Queueable;

    public $order_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
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
        // Get Email & Site Name From Setting
        $from = env('MAIL_FROM');
        $siteName = Cache::get('settings')->where('key', 'site_name')->first()->value;
        $subject = "[{$siteName}] | " . __('lang.new_order');
        $order_id = $this->order_id;
        // Set Code
        return (new MailMessage)
            ->from($from, $siteName)
            ->subject($subject)
            ->view('mail.seller.order', compact('subject', 'siteName', 'notifiable', 'order_id'));
    }
}
