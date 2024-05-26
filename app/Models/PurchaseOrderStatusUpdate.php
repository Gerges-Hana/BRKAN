<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderStatusUpdate extends Model
{
    use HasFactory;

    protected $table = 'purchase_order_status_updates';
    protected $guarded = ['id'];
}
