<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'purchase_orders';
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo(PurchaseOrderStatus::class, 'status_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'last_update_user_id','id');
    }
    public function purchaseOrderUpdates()
    {
        return $this->hasMany(PurchaseOrderUpdate::class, 'purchase_order_id');
    }
}
