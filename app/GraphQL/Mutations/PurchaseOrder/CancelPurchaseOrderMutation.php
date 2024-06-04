<?php

namespace App\GraphQL\Mutations\PurchaseOrder;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderUpdate;
use Carbon\Carbon;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CancelPurchaseOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CancelPurchaseOrder',
    ];

    public function type(): Type
    {
        return GraphQL::type('PurchaseOrderResponse');
    }

    public function args(): array
    {
        return [
            'device_unique_key' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The unique key for the driver device'
            ],
        ];
    }

    public function resolve($root, $args): array
    {
//        $purchaseOrder = PurchaseOrder::query()
//            ->where('device_unique_key', '=', $args['device_unique_key'])
//            ->first();

        $purchaseOrder = PurchaseOrder::query()
            ->where('device_unique_key', '=', $args['device_unique_key'])
            ->where('status_id', '=', 1)
            ->first();

        if (!$purchaseOrder) {
            return [
                'success' => false,
                'message' => 'Purchase order not found',
                'purchaseOrder' => $purchaseOrder,
            ];
        }

        if ($purchaseOrder->status_id == 2) {
            return [
                'success' => false,
                'message' => 'Purchased order already canceled',
                'purchaseOrder' => $purchaseOrder,
            ];
        }

        $datetime = Carbon::now()->format('Y-m-d H:i:s');
        $updatedPurchaseOrder = $purchaseOrder->update([
            'status_id' => 2,
            'updated_at' => $datetime
        ]);
        $purchaseOrder->refresh();

        if ($updatedPurchaseOrder) {
            $purchaseOrderUpdate = new PurchaseOrderUpdate();
            $purchaseOrderUpdate->purchase_order_id = $purchaseOrder->id;
            $purchaseOrderUpdate->status_id = 2;
            $purchaseOrderUpdate->created_at = $datetime;
            $purchaseOrderUpdate->save();

            return [
                'success' => true,
                'message' => 'Cancelled successfully',
                'purchaseOrder' => $purchaseOrder,
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to cancel the purchase order',
                'purchaseOrder' => $purchaseOrder,
            ];
        }
    }
}
