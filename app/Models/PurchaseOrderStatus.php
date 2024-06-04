<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderStatus extends Model
{
    use HasFactory;

    protected $table = 'purchase_order_statuses';
    protected $guarded = ['id'];

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
    public function PurchaseOrderStatusUpdate()
    {
        return $this->hasMany(PurchaseOrderStatusUpdate::class);
    }
}
