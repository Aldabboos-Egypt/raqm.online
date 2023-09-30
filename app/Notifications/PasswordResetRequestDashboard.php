<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetRequestDashboard extends Notification
{
    use Queueable;
    protected $token;

    /**
     * PasswordResetRequest constructor.
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
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


    public function toMail()
    {
        $url = route('dashboard.password.reset', $this->token);

        $setting = Setting::whereIn('key', ['email_1', 'site_name'])->get();
        $from = $setting->where('key', 'email_1')->first()->val;
        $siteName = $setting->where('key', 'site_name')->first()->value;
        $subject = "[{$siteName}] Reset your password";

        return (new MailMessage)
            ->from($from, $siteName)
            ->subject($subject)
            ->view('mail.password.reset', compact('url', 'subject', 'siteName'));
    }

}
