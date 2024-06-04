<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderUpdate;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PurchaseOrdersController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.orders.index');
    }

    public function getOrdersData(Request $request)
    {
        $query = PurchaseOrder::query();
    
        if ($request->filled('purchase_order_number')) {
            $query->where('purchase_order_number', 'like', '%' . $request->purchase_order_number . '%');
        }
    
        if ($request->filled('invoice_number')) {
            $query->where('invoice_number', 'like', '%' . $request->invoice_number . '%');
        }
    
        if ($request->filled('driver_name')) {
            $query->where('driver_name', 'like', '%' . $request->driver_name . '%');
        }
    
        if ($request->filled('rep_name')) {
            $query->where('rep_name', 'like', '%' . $request->rep_name . '%');
        }
    
        if ($request->filled('driver_phone')) {
            $query->where('driver_phone', 'like', '%' . $request->driver_phone . '%');
        }
    
        if ($request->filled('rep_phone')) {
            $query->where('rep_phone', 'like', '%' . $request->rep_phone . '%');
        }
    
        if ($request->filled('arrival_date')) {
            $query->where('arrival_date', 'like', '%' . $request->arrival_date . '%');
        }
    
        if ($request->filled('arrived_at')) {
            $query->where('arrived_at', 'like', '%' . $request->arrived_at . '%');
        }
    
        if ($request->filled('entered_at')) {
            $query->where('entered_at', 'like', '%' . $request->entered_at . '%');
        }
    
        if ($request->filled('unloaded_at')) {
            $query->where('unloaded_at', 'like', '%' . $request->unloaded_at . '%');
        }
    
        if ($request->filled('left_at')) {
            $query->where('left_at', 'like', '%' . $request->left_at . '%');
        }
    
        if ($request->filled('created_at')) {
            $query->where('created_at', 'like', '%' . $request->created_at . '%');
        }
    
        if ($request->filled('updated_at')) {
            $query->where('updated_at', 'like', '%' . $request->updated_at . '%');
        }
    
        // $data = $query->latest()->get();
        $data = $query
        ->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
    

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        $order = PurchaseOrder::find($id);
        if (!$order) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }

        return response()->json($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = PurchaseOrder::find($id);
        if (!$order) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }

        return response()->json($order);
    }
    public function update(Request $request, $id)
    {

        // dd($request->all());
        // return 'ggggggggggggg';
        $order = PurchaseOrder::find($id);
        if (!$order) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }

        $validated = $request->validate([
            'arrival_date' => 'nullable|date',
            'canceled_at' => 'nullable|date',
            'arrived_at' => 'nullable|date',
            'entered_at' => 'nullable|date',
            'unloaded_at' => 'nullable|date',
            'left_at' => 'nullable|date',
        ]);

        $order->update($validated);
        return response()->json(['message' => 'تم تحديث الطلبيه بنجاح', 'data' => $request->all()]);
    }

    public function destroy($id): RedirectResponse
    {
        PurchaseOrder::find($id)->delete();
        return redirect()->route('orders.index')
            ->with('success', 'تم حذف الطلبيه بنجاح ');
    }

    public function HistoryOfPurchaseOrdersC($id){
        $order = PurchaseOrder::find($id);
        $orders = PurchaseOrderUpdate::find($id)->get();
        if (!$order) {
            return redirect()->back()->with('error', 'الطلبية غير موجودة');
        }

        return view('admin.orders.history', compact('order','orders'));
    }

}
