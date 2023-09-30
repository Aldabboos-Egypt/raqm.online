<?php

namespace App\Notifications\Seller;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompleteStoreData extends Notification
{
    use Queueable;
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
            'route'             => 'dashboard.sellers.store',
            'message_ar'        => 'تم اكمال بيانات المتجر بواسطة التاجر: ' . $this->user->username,
            'message_en'        => 'The store data completed by seller: ' . $this->user->username,
        ];
    }
}
