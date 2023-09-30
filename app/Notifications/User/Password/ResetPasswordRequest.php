<?php

namespace App\Notifications\User\Password;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordRequest extends Notification
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
        $token = $this->token;

        $setting = Setting::whereIn('key', ['email_1', 'site_name'])->get();
        $from =  env('MAIL_FROM');
        $siteName = $setting->where('key', 'site_name')->first()->value;
        $subject = "[{$siteName}] " . __('lang.reset_your_password');

        return (new MailMessage)
            ->from($from, $siteName)
            ->subject($subject)
            ->view('mail.user.password.reset', compact('token', 'subject', 'siteName'));
    }
}
