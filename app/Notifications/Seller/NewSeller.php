<?php

namespace App\Notifications\Seller;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSeller extends Notification
{
    protected $user;

    /**
     * Create a new notification instance.
     * @param $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase()
    {
        return [
            'admin'             => 1,
            'id'                => $this->user->id,
            'path'              => 'sellers',
            'route'             => 'dashboard.sellers.view',
            'message_ar'        => 'تسجيل جديد بواسطة التاجر: ' . $this->user->username,
            'message_en'        => 'New registration by the seller: ' . $this->user->username,
        ];
    }
}
