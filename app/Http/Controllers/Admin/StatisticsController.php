<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;


class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPurchaseOrder = PurchaseOrder::with(['purchaseOrderUpdate'])->get()->count();
        $countStatus1 = PurchaseOrder::where('status_id',1)->get()->count();
        $countStatus2 = PurchaseOrder::where('status_id',2)->get()->count();
        $countStatus3_4_5 = PurchaseOrder::whereIn('status_id',[3,4,5])->count();
        $countStatus3 = PurchaseOrder::where('status_id',3)->get()->count();
        $countStatus4 = PurchaseOrder::where('status_id',4)->get()->count();
        $countStatus5 = PurchaseOrder::where('status_id',5)->get()->count();
        $countStatus6 = PurchaseOrder::where('status_id',6)->get()->count();
        
    $today = Carbon::today();
    $ordersToday = PurchaseOrder::query()->whereDate('arrival_date', $today)->count();
    $ordersTodayStatus1 = PurchaseOrder::query()->whereDate('arrival_date', $today)->where('status_id',1)->count();
    $ordersTodayStatus2 = PurchaseOrder::query()->whereDate('arrival_date', $today)->where('status_id',2)->get()->count();
    $ordersTodayStatus3_4_5 = PurchaseOrder::query()->whereDate('arrival_date', $today)->whereIn('status_id',[3,4,5])->count();
    $ordersTodayStatus3 = PurchaseOrder::query()->whereDate('arrival_date', $today)->where('status_id',3)->get()->count();
    $ordersTodayStatus4 = PurchaseOrder::query()->whereDate('arrival_date', $today)->where('status_id',4)->get()->count();
    $ordersTodayStatus5 = PurchaseOrder::query()->whereDate('arrival_date', $today)->where('status_id',5)->get()->count();
    $ordersTodayStatus6 = PurchaseOrder::query()->whereDate('arrival_date', $today)->where('status_id',6)->get()->count();



    $endOfWeek = $today->copy()->addDays(0);   
    $startOfWeek = $today->copy()->subDays(7);  
    $dailyOrders = [];
    $dailyTotals = [];
    for ($i = 0; $i < 8; $i++) {
        $date = $endOfWeek->copy()->subDays($i)->toDateString();
        $dailyOrders[$date] = PurchaseOrder::whereDate('created_at', $date)->count();
    }
    foreach ($dailyOrders as $date => $count) {
        $dailyTotals[] = $count;
    }

    // Define daily variables
    $day_1 = $dailyTotals[0] ?? 0;
    $day_2 = $dailyTotals[1] ?? 0;
    $day_3 = $dailyTotals[2] ?? 0;
    $day_4 = $dailyTotals[3] ?? 0;
    $day_5 = $dailyTotals[4] ?? 0;
    $day_6 = $dailyTotals[5] ?? 0;
    $day_7 = $dailyTotals[6] ?? 0;
    $day_8 = $dailyTotals[7] ?? 0;








    $weeklyOrders = [];

    for ($i = 0; $i < 8; $i++) {
        $startOfWeek = $today->copy()->subWeeks($i)->startOfWeek()->toDateString();
        $endOfWeek = $today->copy()->subWeeks($i)->endOfWeek()->toDateString();
        $weeklyOrders[$i] = PurchaseOrder::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
    }

    // Define weekly variables
    $week_1 = $weeklyOrders[0] ?? 0;
    $week_2 = $weeklyOrders[1] ?? 0;
    $week_3 = $weeklyOrders[2] ?? 0;
    $week_4 = $weeklyOrders[3] ?? 0;
    $week_5 = $weeklyOrders[4] ?? 0;
    $week_6 = $weeklyOrders[5] ?? 0;
    $week_7 = $weeklyOrders[6] ?? 0;
    $week_8 = $weeklyOrders[7] ?? 0;










    $monthlyOrders = [];

    for ($i = 0; $i < 12; $i++) {
        $startOfMonth = $today->copy()->subMonths($i)->startOfMonth()->toDateString();
        $endOfMonth = $today->copy()->subMonths($i)->endOfMonth()->toDateString();
        $monthlyOrders[$i] = PurchaseOrder::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
    }

    // Define monthly variables
    $month_1 = $monthlyOrders[0] ?? 0;
    $month_2 = $monthlyOrders[1] ?? 0;
    $month_3 = $monthlyOrders[2] ?? 0;
    $month_4 = $monthlyOrders[3] ?? 0;
    $month_5 = $monthlyOrders[4] ?? 0;
    $month_6 = $monthlyOrders[5] ?? 0;
    $month_7 = $monthlyOrders[6] ?? 0;
    $month_8 = $monthlyOrders[7] ?? 0;
    $month_9 = $monthlyOrders[8] ?? 0;
    $month_10 = $monthlyOrders[9] ?? 0;
    $month_11 = $monthlyOrders[10] ?? 0;
    $month_12 = $monthlyOrders[11] ?? 0;



    return view('admin.home.index', compact(
        'allPurchaseOrder',
        'countStatus1', 
        'countStatus2',
        'countStatus3_4_5',
        'countStatus3',
        'countStatus4',
        'countStatus5',
        'countStatus6',
        'ordersToday',
        'ordersTodayStatus1',
        'ordersTodayStatus2',
        'ordersTodayStatus3_4_5',
        'ordersTodayStatus3',
        'ordersTodayStatus4',
        'ordersTodayStatus5',
        'ordersTodayStatus6',
        'dailyOrders',
        'dailyTotals',
        'day_1', 'day_2', 'day_3', 'day_4', 'day_5', 'day_6', 'day_7', 'day_8',
        'week_1', 'week_2', 'week_3', 'week_4', 'week_5', 'week_6', 'week_7', 'week_8',
        'month_1', 'month_2', 'month_3', 'month_4', 'month_5', 'month_6', 'month_7', 'month_8', 'month_9', 'month_10', 'month_11', 'month_12'

    
    ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
