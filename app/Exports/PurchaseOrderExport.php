<?php

namespace App\Exports;

use App\Models\PurchaseOrder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PurchaseOrderExport implements FromCollection, WithHeadings
{
    protected $purchaseOrders;

    public function __construct(Collection $purchaseOrders)
    {
        $this->purchaseOrders = $purchaseOrders;
    }
    
    public function collection()
    {
        return $this->purchaseOrders->map(function ($order) {
            return [
                'id' => $order->id,
                'device_unique_key' => $order->device_unique_key,
                'purchase_order_number' => $order->purchase_order_number,
                'invoice_number' => $order->invoice_number,
                'driver_name' => $order->driver_name,
                'rep_name' => $order->rep_name,
                'driver_phone' => $order->driver_phone,
                'rep_phone' => $order->rep_phone,
                'arrival_date' => $order->arrival_date,
                'status_name' => $order->status->name ?? 'غير معروف',
                'user_name' => $order->user->name ?? 'غير معروف',
                'created_at' => $order->created_at,
                'updated_at' => $order->updated_at,
            ];
        });
    }
    
    public function headings(): array
    {
        return [
            '#',
            'رقم الجهاز',
            'رقم الطلبيه',
            'رقم الفاتوره',
            'اسم السائق',
            'اسم المندوب',
            'رقم السائق',
            'رقم المندوب',
            'تاريخ الوصول',
            'حاله الطلب',
            'المستخدم',
            'وقت الانشاء',
            'وقت التعديل',
        ];
    }
}
