<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseOrderStatus;
use App\Requests\PurchaseOrderStatusRequest;
use App\Services\PurchaseOrderStatusService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class PurchaseOrderStatusesController extends Controller
{
    private $service;

    public function __construct(PurchaseOrderStatusService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $statuses = $this->service->getAllStatuses();
        return view('admin.status.index', ['statuses' => $statuses]);
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
            return redirect()->route('status.index')->with('success', 'تم إنشاء الحالة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'فشل في إنشاء حالة طلب الشراء: ' . $e->getMessage());
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
            return redirect()->route('status.index')->with('success', 'تم تحديث الحالة بنجاح');
        } else {
            return redirect()->back()->with('error', 'فشل في تحديث حالة طلب الشراء');
        }
    }
    public function destroy($id)
    {
        $response = $this->service->deleteStatus($id);
        if ($response['success']) {
            return redirect()->route('status.index')->with('success', $response['message']);
        } else {
            return redirect()->route('status.index')->with('error', $response['message']);
        }
    }
}
