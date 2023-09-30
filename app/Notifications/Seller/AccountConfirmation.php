<?php

namespace App\Notifications\Seller;

use App\Channels\YamamahSMS;
use App\Notifications\Messages\SmsMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountConfirmation extends Notification
{
    use Queueable;
    private $code;
    private $username;
    private $via;

    /**
     * Create a new notification instance.
     * @param $code
     * @param $username
     * @param bool $viaPhone
     * @return void
     */
    public function __construct($code, $username, bool $viaPhone = false)
    {
        $this->code = $code;
        $this->username = $username;
        // $this->via = $viaPhone ? SharingServiceProvider::VIA : 'email';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ($this->via == 'phone') ? [YamamahSMS::class] : ['mail'];
    }

    public function toYamamahSMS($notifiable)
    {
        return (new SmsMessage())
            ->setContent(__('lang.your_membership_activation_code') . $this->code)
            ->setRecipient($notifiable->full_phone);
    }

    /**
     * Get the mail representation of the notification.
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail()
    {
        // dd($setting);
        // $from = $setting->where('key', 'email_1')->first()->val;
        $from = env('MAIL_FROM');
        $siteName = env('APP_NAME');
        $subject = "[{$siteName}] | " . __('lang.account_confirmation');
        // Set Code
        $code = $this->code;
        $username = $this->username;
        return (new MailMessage)
            ->from($from, $siteName)
            ->subject($subject)
            ->view('mail.confirm', compact('code', 'subject', 'siteName', 'username'));
    }

}
