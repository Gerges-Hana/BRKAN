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
    
        $status = $this->service->createStatus($validatedData);     
         if ($status) {
            return redirect()->route('status')->with('success', 'تم إنشاء الحالة بنجاح');
        } else {
            return redirect()->back()->with('error', 'فشل في إنشاء حالة طلب الشراء');
        }
    }

    public function update(Request $request, $id)
    {
        $status = $this->service->updateStatus($id, $request->validated());
        if ($status) {
            return response()->json($status);
        } else {
            return response()->json(['error' => 'Failed to update purchase order status'], 500);
        }
    }

    public function destroy($id)
    {
        $success = $this->service->deleteStatus($id);
        if ($success) {
            return response()->json(null, 204);
        } else {
            return response()->json(['error' => 'Failed to delete purchase order status'], 500);
        }
    }
}
