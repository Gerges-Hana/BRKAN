<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PurchaseOrder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    private $PurchaseOrder_status_id;
    private $PurchaseOrder_id;
    private $PurchaseOrder;

    public function __construct($PurchaseOrder)
    {
        // $this->PurchaseOrder_status_id = $PurchaseOrder_status_id;
        // $this->PurchaseOrder_id = $PurchaseOrder_id;
        $this->$PurchaseOrder = $PurchaseOrder;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            // 'data' => $this->details['body']
            'id' => $this->PurchaseOrder->id,
            'title' =>'تم اضافه فتوره بواستط :',
            'user'=>$this->PurchaseOrder->driver_name,
        ];
    }
}
