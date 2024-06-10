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
        $allPurchaseOrder = PurchaseOrder::with(['purchaseOrderUpdate'])->get();
        $countStatus1 = PurchaseOrder::where('status_id',1)->get()->count();
        $countStatus2 = PurchaseOrder::where('status_id',2)->get()->count();
        $countStatus3_4_5 = PurchaseOrder::whereIn('status_id',[3,4,5])->count();
        $countStatus6 = PurchaseOrder::where('status_id',6)->get()->count();

    $today = Carbon::today();
    $ordersToday = PurchaseOrder::query()
        ->whereDate('arrival_date', $today)
        ->count();

    $ordersTodayStatus1 = PurchaseOrder::whereDate('arrival_date', $today)->where('status_id',1)->count();

    $ordersTodayStatus2 = PurchaseOrder::whereDate('arrival_date', $today)->where('status_id',2)->get()->count();
    $ordersTodayStatus3_4_5 = PurchaseOrder::whereDate('arrival_date', $today)->whereIn('status_id',[3,4,5])->count();
    $ordersTodayStatus6 = PurchaseOrder::whereDate('arrival_date', $today)->where('status_id',6)->get()->count();

    return view('admin.home.index', compact(
        'allPurchaseOrder',
        'countStatus1', 
        'countStatus2',
        'countStatus3_4_5',
        'countStatus6',
        'ordersToday',
        'ordersTodayStatus1',
        'ordersTodayStatus2',
        'ordersTodayStatus3_4_5',
        'ordersTodayStatus6',
    
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
