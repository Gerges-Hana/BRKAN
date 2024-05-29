<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'purchase_orders';
    protected $guarded = ['id'];

    public function status()
    {
        return $this->belongsTo(PurchaseOrderStatus::class, 'status_id');
    }
}
