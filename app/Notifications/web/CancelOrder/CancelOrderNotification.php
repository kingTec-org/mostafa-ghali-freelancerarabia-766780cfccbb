<?php

namespace App\Notifications\web\CancelOrder;

use App\Models\Item\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CancelOrderNotification extends Notification
{
    use Queueable;
    protected $item ;
    protected $title;
    protected $body;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Item $item , $title , $body)
    {
        $this->item = $item;
        $this->title = $title;
        $this->body = $body;
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
            'type'=>'service_order_cancel',
            'item_id'=>$this->item->id,
            'service_name'=>$this->item->service->title,
            'requester_user_id'=>$this->item->order->user_id,
            'service_owner_id'=>$this->item->order->user_id,
            'title'=>$this->title,
            'body'=>$this->body
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
