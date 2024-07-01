<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseOrderStatus;
use App\Services\PurchaseOrderStatusService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class PurchaseOrderStatusesController extends Controller
{
    private $service;

    public function __construct(PurchaseOrderStatusService $service)
    {
        $this->service = $service;
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.status.index');
    }

    public function getStatusData(Request $request): JsonResponse
    {
        $name = strtolower($request->input('name'));
        $is_active = filter_var($request->input('is_active'), FILTER_VALIDATE_BOOLEAN);

        $status = PurchaseOrderStatus::query();
        if ($request->filled('name')) {
            $status->whereRaw('LOWER(name) like ?', ['%' . $name . '%']);
        }
        if ($request->filled('is_active')) {
            $status->where('is_active', $is_active);
        }

        return DataTables::of($status)->toJson();
    }

    public function show($id)
    {
        $status = $this->service->getStatusById($id);
        if ($status) {
            return view('admin.status.show', ['status' => $status]); // حدد اسم View ومرر البيانات
        } else {
            return response()->json(['error' => 'Purchase order status not found'], 404);
        }
    }

    public function create()
    {
        return view('admin.status.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);
        try {
            $purchaseOrderStatus = new PurchaseOrderStatus();
            $purchaseOrderStatus->name = $validatedData['name'];
            $purchaseOrderStatus->is_active = $validatedData['is_active'] ?? true;
            $purchaseOrderStatus->save();
            Session::flash('success_message', 'تم إنشاء الحالة بنجاح');
            return redirect()->route('status.index');
        } catch (\Exception $e) {
            Session::flash('error_message', 'فشل في إنشاء حالة طلب الشراء: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $status = PurchaseOrderStatus::findOrFail($id);
        return view('admin.status.edit', ['status' => $status]);
    }

    public function update(Request $request, $id)
    {
        $status = $this->service->updateStatus($id, $request->all());

        if ($status) {
            Session::flash('success_message', 'تم تحديث الحالة بنجاح');
            return redirect()->route('status.index')->with('success', 'تم تحديث الحالة بنجاح');
        } else {
            Session::flash('error_message', 'فشل في تحديث حالة طلب الشراء');
            return redirect()->back();
        }
    }

    /**
     * Check if the status has relations before deleting it
     *
     * @param $id
     * @return JsonResponse
     */
    public function checkHasRelations($id): JsonResponse
    {
        $role_relations_1 = DB::table("purchase_orders")->where("status_id", $id)->count();
        $role_relations_2 = DB::table("purchase_order_updates")->where("status_id", $id)->count();

        return response()->json(['has_relations' => $role_relations_1 > 0 || $role_relations_2 > 0]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $deleted = DB::table("purchase_order_statuses")->where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['success' => true, 'success_message' => 'تم حذف الحالة بنجاح!']);
        } else {
            return response()->json(['success' => false, 'error_message' => 'فشل الحذف حاول مرة اخرى!']);
        }
    }
}
