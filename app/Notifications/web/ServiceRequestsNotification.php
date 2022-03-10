<?php

namespace App\Notifications\web;

use App\Models\Item\Item;
use App\Models\Services\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ServiceRequestsNotification extends Notification
{
    use Queueable;
    private $item;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;

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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return [
            'type'=>'service_request',
            'item_id'=>$this->item->id,
            'service_name'=>$this->item->service->title,
            'requester_user_id'=>$this->item->order->user_id,
            'title'=>' طلب خدمة',
            'body'=>'لديك طلب خدمة'
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
