<?php

namespace App\GraphQL\Mutations\PurchaseOrder;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderUpdate;
use Carbon\Carbon;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class VerifyPurchaseOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'VerifyPurchaseOrder',
    ];

    public function type(): Type
    {
        return GraphQL::type('PurchaseOrderResponse');
    }

    public function args(): array
    {
        return [
            'purchase_order_number' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The number of the purchase order'
            ],
        ];
    }

    public function resolve($root, $args): array
    {
        $purchaseOrder = PurchaseOrder::query()
            ->where('purchase_order_number', '=', $args['purchase_order_number'])
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
                'message' => 'This purchase order was canceled and cannot be verified',
                'purchaseOrder' => $purchaseOrder,
            ];
        }

        if ($purchaseOrder->status_id == 3) {
            return [
                'success' => false,
                'message' => 'This purchase order already verified before',
                'purchaseOrder' => $purchaseOrder,
            ];
        }

        $datetime = Carbon::now()->format('Y-m-d H:i:s');
        $updatedPurchaseOrder = $purchaseOrder->update([
            'status_id' => 3,
            'updated_at' => $datetime
        ]);
        $purchaseOrder->refresh();

        if ($updatedPurchaseOrder) {
            $purchaseOrderUpdate = new PurchaseOrderUpdate();
            $purchaseOrderUpdate->purchase_order_id = $purchaseOrder->id;
            $purchaseOrderUpdate->status_id = 3;
            $purchaseOrderUpdate->created_at = $datetime;
            $purchaseOrderUpdate->save();

            return [
                'success' => true,
                'message' => 'Verified successfully',
                'purchaseOrder' => $purchaseOrder,
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to verify the purchase order',
                'purchaseOrder' => $purchaseOrder,
            ];
        }
    }
}
