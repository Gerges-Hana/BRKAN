<?php
namespace App\Services;

use App\Models\PurchaseOrderStatus;
use App\Repositories\PurchaseOrderStatusRepository;

class PurchaseOrderStatusService
{
    protected $repository;

    public function __construct(PurchaseOrderStatusRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllStatuses()
    {
        return $this->repository->getAll();
    }

    public function getStatusById($id)
    {
        return $this->repository->find($id);
    }

    public function createStatus(array $data)
    {
        return $this->repository->create( $data);

        // return PurchaseOrderStatus::create($data);
    }

    public function updateStatus($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteStatus($id)
    {
        return $this->repository->delete($id);
    }
}