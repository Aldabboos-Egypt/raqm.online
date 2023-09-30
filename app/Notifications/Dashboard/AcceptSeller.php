<?php

namespace App\Notifications\Dashboard;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptSeller extends Notification
{
    use Queueable;

    protected $seller_type;

    /**
     * Create a new notification instance.
     * @param $seller_type
     * @return void
     */
    public function __construct($seller_type)
    {
        $this->seller_type = $seller_type;
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
        $setting = Setting::whereIn('key', ['email_1', 'site_name'])->get();
        $from = $setting->where('key', 'email_1')->first()->val;
        $siteName = $setting->where('key', 'site_name')->first()->val;
        $subject = "تم قبول الحساب الخاص بك";
        $seller_type = $this->seller_type;
        return (new MailMessage)
            ->from($from, $siteName)
            ->subject($subject)
            ->view('mail.dashboard.accept_seller', compact('seller_type', 'subject', 'siteName'));
    }
}
