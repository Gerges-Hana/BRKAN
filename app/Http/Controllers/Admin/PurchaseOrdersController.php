<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderUpdate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PurchaseOrdersController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.orders.index');
    }

    public function getOrdersData(Request $request)
    {
        $purchase_orders = PurchaseOrder::query();

        if ($request->filled('purchase_order_number')) {
            $purchase_orders->where('purchase_order_number', 'like', '%' . $request->purchase_order_number . '%');
        }

        if ($request->filled('invoice_number')) {
            $purchase_orders->where('invoice_number', 'like', '%' . $request->invoice_number . '%');
        }

        if ($request->filled('driver_name')) {
            $purchase_orders->where('driver_name', 'like', '%' . $request->driver_name . '%');
        }

        if ($request->filled('rep_name')) {
            $purchase_orders->where('rep_name', 'like', '%' . $request->rep_name . '%');
        }

        if ($request->filled('driver_phone')) {
            $purchase_orders->where('driver_phone', 'like', '%' . $request->driver_phone . '%');
        }

        if ($request->filled('rep_phone')) {
            $purchase_orders->where('rep_phone', 'like', '%' . $request->rep_phone . '%');
        }

        if ($request->filled('arrival_date')) {
            $purchase_orders->where('arrival_date', 'like', '%' . $request->arrival_date . '%');
        }

        if ($request->filled('arrived_at')) {
            $purchase_orders->where('arrived_at', 'like', '%' . $request->arrived_at . '%');
        }

        if ($request->filled('entered_at')) {
            $purchase_orders->where('entered_at', 'like', '%' . $request->entered_at . '%');
        }

        if ($request->filled('unloaded_at')) {
            $purchase_orders->where('unloaded_at', 'like', '%' . $request->unloaded_at . '%');
        }

        if ($request->filled('left_at')) {
            $purchase_orders->where('left_at', 'like', '%' . $request->left_at . '%');
        }

        if ($request->filled('created_at')) {
            $purchase_orders->where('created_at', 'like', '%' . $request->created_at . '%');
        }

        if ($request->filled('updated_at')) {
            $purchase_orders->where('updated_at', 'like', '%' . $request->updated_at . '%');
        }

        return DataTables::of($purchase_orders)->toJson();
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
        $order = PurchaseOrder::query()->with(['purchaseOrderUpdates', 'status'])->find($id);
        if (!$order) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }
        return response()->json($order);
    }

    public function edit($id)
    {
        $order = PurchaseOrder::query()->with(['purchaseOrderUpdates' => function ($query) {
            $query->orderBy('id', 'desc');
        }])->find($id);

        if (!$order) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }
        $order->purchaseOrderUpdates->each(function ($update) {
            $update->formatted_created_at = Carbon::parse($update->created_at)->format('Y-m-d H:i');
        });
        return response()->json(['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $statusId = $request->status_id;
        $order = PurchaseOrder::find($id);
        if (!$order) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }
        $validated = $request->validate([
            'entered_at' => 'nullable|date',
            'unloaded_at' => 'nullable|date',
            'left_at' => 'nullable|date',
        ]);
        $order->status_id = $statusId;
        $order->last_update_user_id = Auth::id();
        $order->save();

        if ($statusId == 4) {
            $order->purchaseOrderUpdates()->create([
                'purchase_order_id' => $order->id,
                'user_id' => Auth::id(),
                'status_id' => $statusId,
                'created_at' => $request->entered_at,
            ]);
        } elseif ($statusId == 5) {
            $order->purchaseOrderUpdates()->create([
                'purchase_order_id' => $order->id,
                'user_id' => Auth::id(),
                'status_id' => $statusId - 1,
                'created_at' => $request->entered_at,
            ]);

            $order->purchaseOrderUpdates()->create([
                'purchase_order_id' => $order->id,
                'user_id' => Auth::id(),
                'status_id' => $statusId,
                'created_at' => $request->unloaded_at,
            ]);
        } elseif ($statusId == 6) {
            $order->purchaseOrderUpdates()->create([
                'purchase_order_id' => $order->id,
                'user_id' => Auth::id(),
                'status_id' => $statusId - 2,
                'created_at' => $request->entered_at,
            ]);

            $order->purchaseOrderUpdates()->create([
                'purchase_order_id' => $order->id,
                'user_id' => Auth::id(),
                'status_id' => $statusId - 1,
                'created_at' => $request->unloaded_at,
            ]);

            $order->purchaseOrderUpdates()->create([
                'purchase_order_id' => $order->id,
                'user_id' => Auth::id(),
                'status_id' => $statusId,
                'created_at' => $request->left_at,
            ]);
        }

        return response()->json(['success' => true, 'success_message' => 'تم تحديث الطلبيه بنجاح', 'data' => $request->all()]);
    }

    public function HistoryOfPurchaseOrdersC($id)
    {
        $order = PurchaseOrder::query()->with(['purchaseOrderUpdates'])->find($id);
        if (!$order) {
            return redirect()->back()->with('error', 'الطلبية غير موجودة');
        }

        return view('admin.orders.history', compact('order'));
    }


    /**
     * Check if the item has relations before deleting it
     *
     * @param $id
     * @return JsonResponse
     */
    public function checkHasRelations($id): JsonResponse
    {
        $purchase_order = PurchaseOrder::query()->find($id);

        return response()->json(['has_relations' => $purchase_order->statusId != 2]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $order = PurchaseOrder::query()->with(['purchaseOrderUpdates'])->find($id);
        if ($order) {
            $order->purchaseOrderUpdates()->delete();
            $order->delete();
            return response()->json(['success' => true, 'success_message' => 'تم حذف الطلبية بنجاح!']);
        } else {
            return response()->json(['success' => false, 'error_message' => 'لم يتم العثور على الطلبيه'], 404);
        }
    }
}
