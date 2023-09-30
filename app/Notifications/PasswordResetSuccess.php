<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetSuccess extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

    public function toMail($notifiable)
    {
        // Get Email & Site Name From Setting
        $setting = Setting::whereIn('key', ['email_1', 'site_name'])->get();
        $from = $setting->where('key', 'email_1')->first()->val;
        $siteName = $setting->where('key', 'site_name')->first()->value;
        $subject = "[{$siteName}] Reset Password Successfully";

        return (new MailMessage)
            ->from($from, $siteName)
            ->subject($subject)
            ->view('mail.password.success');
    }
}
