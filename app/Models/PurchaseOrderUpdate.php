<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderUpdate extends Model
{
    use HasFactory;

    protected $table = 'purchase_order_updates';
    protected $guarded = ['id'];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class,'purchase_order_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function status()
    {
        return $this->belongsTo(PurchaseOrderStatus::class, 'status_id','id');
    }
}
