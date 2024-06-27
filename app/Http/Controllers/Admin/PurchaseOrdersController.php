<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderUpdate;
use App\Models\User;
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

        $data = $query
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc');
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
        $order = PurchaseOrder::query()->with(['purchaseOrderUpdates', 'status'])->find($id);
        if (!$order) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }
        return response()->json($order);
    }

    public function edit($id)
    {
        $order = PurchaseOrder::query()->with(['purchaseOrderUpdates'])->find($id);
        if (!$order) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }

        return response()->json($order);
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


        return response()->json(['message' => 'تم تحديث الطلبيه بنجاح', 'data' => $request->all()]);
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
