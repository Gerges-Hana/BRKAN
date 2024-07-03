<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseOrderStatus;
use App\Models\PurchaseOrderUpdate;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PurchaseOrderUpdatesController extends Controller
{
    public function index(): View
    {
        $purchaseOrderStatuses = PurchaseOrderStatus::all();
        return view('admin.orders.updates.index')->with('purchaseOrderStatuses', $purchaseOrderStatuses);
    }

    /**
     * @throws Exception|Exception
     */
    public function getUpdatesData(Request $request): JsonResponse
    {
        $purchase_order_number = $request->input('purchase_order_number');
        $statusId = $request->input('statusId');

        $purchaseOrderUpdates = PurchaseOrderUpdate::query();

        if ($request->filled('purchase_order_number')) {
            $purchaseOrderUpdates->whereHas('purchaseOrder', function ($query) use ($purchase_order_number) {
                $query->where('purchase_order_number', 'like', '%' . $purchase_order_number . '%');
            });
        }
        if ($request->filled('statusId')) {
            $purchaseOrderUpdates->where('status_id', $statusId);
        }

        return DataTables::of($purchaseOrderUpdates->with(['purchaseOrder', 'status', 'user']))->toJson();
    }

    public function list(): JsonResponse
    {
        $notifications = PurchaseOrderUpdate::query()
            ->whereIn('status_id', [1, 2, 3])
            ->orderBy('created_at', 'DESC')
            ->with('purchaseOrder')
            ->get();
        return response()->json(['notifications' => $notifications]);
    }

    public function unReadList(): JsonResponse
    {
        $notifications = PurchaseOrderUpdate::query()
            ->whereNull('notification_read_at')
            ->whereIn('status_id', [1, 2, 3])
            ->orderBy('created_at', 'DESC')
            ->with('purchaseOrder')
            ->get();
        return response()->json(['notifications' => $notifications]);
    }

    public function readAll(): JsonResponse
    {
        $updated = PurchaseOrderUpdate::query()->whereNull('notification_read_at')->update(['notification_read_at' => Carbon::now()]);
        if ($updated) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'error_message' => 'فشل التحديث']);
        }
    }

    public function readOne($id): JsonResponse
    {
        $purchaseOrderUpdate = PurchaseOrderUpdate::query()->findOrFail($id);
        if ($purchaseOrderUpdate) {
            $purchaseOrderUpdate->update(['notification_read_at' => Carbon::now()]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'error_message' => 'لم تيم العثور على التحديث']);
        }
    }
}
