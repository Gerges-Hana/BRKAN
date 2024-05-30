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
        $purchaseOrder = PurchaseOrder::query()->where('device_unique_key', '=', $args['device_unique_key'])->first();

        if (!$purchaseOrder) {
            return [
                'success' => false,
                'message' => 'Purchase order not found',
                'purchaseOrder' => $purchaseOrder,
            ];
        }

        if ($purchaseOrder->arrived_at && $purchaseOrder->status_id != 2) {
            return [
                'success' => false,
                'message' => 'This purchase order cannot be canceled',
                'purchaseOrder' => $purchaseOrder,
            ];
        }

        if ($purchaseOrder->canceled_at && $purchaseOrder->status_id == 2) {
            return [
                'success' => false,
                'message' => 'Purchased order already canceled',
                'purchaseOrder' => $purchaseOrder,
            ];
        }

        $updatedPurchaseOrder = $purchaseOrder->update([
            'status_id' => 2,
            'canceled_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        if ($updatedPurchaseOrder) {
            $purchaseOrderUpdate = new PurchaseOrderUpdate();
            $purchaseOrderUpdate->purchase_order_id = $purchaseOrder->id;
            $purchaseOrderUpdate->status_id = 2;
            $purchaseOrderUpdate->canceled_at = Carbon::now()->format('Y-m-d H:i:s');
            $purchaseOrderUpdate->save();
            $purchaseOrder->refresh();

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
