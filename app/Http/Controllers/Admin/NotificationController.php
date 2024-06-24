<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function fetchNotifications()
    {
        $today = Carbon::today()->format('Y-m-d');
        $orders = PurchaseOrder::whereDate('arrival_date', $today)->whereIn('status_id', [1,2,3])->get();
        return response()->json($orders);
    }
}
