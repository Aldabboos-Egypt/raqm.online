<?php

namespace App\Notifications\User\Password;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SuccessResetPassword extends Notification
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
        $from =  env('MAIL_FROM');
        $siteName = $setting->where('key', 'site_name')->first()->value;
        $subject = "[{$siteName}] " . __('lang.reset_password_successfully');

        return (new MailMessage)
            ->from($from, $siteName)
            ->subject($subject)
            ->view('mail.user.password.success', compact('siteName', 'subject'));
    }

}
