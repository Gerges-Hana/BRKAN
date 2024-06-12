<?php
namespace App\Repositories;

use App\Models\PurchaseOrderStatus;

class PurchaseOrderStatusRepository
{
    public function getAll()
    {
        return PurchaseOrderStatus::all();
    }
    public function find($id)
    {
        return PurchaseOrderStatus::find($id);
    }
    public function create(array $data)
    {
        return PurchaseOrderStatus::create($data);
    }
    public function update($id, array $data)
    {
        $status = $this->find($id);
        if ($status) {
            $status->update($data);
            return $status;
        }
        return null;
    }
    public function delete($id)
    {
        $status = $this->find($id);
        if ($status) {
            if ($status->purchaseOrders()->count() > 0) {
                return ['success' => false, 'message' => 'الحالة لا يمكن حذفها لأنها مرتبطة بطلبات.'];
            } else {
                $status->delete();
                return ['success' => true, 'message' => 'تم حذف الحالة بنجاح.'];
            }
        }
        return ['success' => false, 'message' => 'لم يتم العثور على الحالة.'];
    
    }
}