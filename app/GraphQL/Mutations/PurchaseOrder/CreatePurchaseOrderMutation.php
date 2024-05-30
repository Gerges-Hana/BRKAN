<?php

namespace App\GraphQL\Mutations\PurchaseOrder;

use App\Models\PurchaseOrder;
use Carbon\Carbon;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreatePurchaseOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreatePurchaseOrder',
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
            ],
            'purchase_order_number' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'invoice_number' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'driver_name' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'rep_name' => [
                'type' => Type::string(),
            ],
            'driver_phone' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'rep_phone' => [
                'type' => Type::string(),
            ],
            'arrival_date' => [
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args): array
    {
        $currentNotCanceledPurchaseOrder = PurchaseOrder::query()
            ->where('purchase_order_number', '=', $args['purchase_order_number'])
            ->where('status_id', '!=', 2) // Not Canceled
            ->first();
        if ($currentNotCanceledPurchaseOrder) {
            if ($currentNotCanceledPurchaseOrder->device_unique_key == $args['device_unique_key']) {
                return [
                    'success' => false,
                    'message' => 'Order already created before',
                    'purchaseOrder' => $currentNotCanceledPurchaseOrder,
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Order already created before by another driver',
                    'purchaseOrder' => null,
                ];
            }
        }

        //Create new purchase order
        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->fill($args);
        $purchaseOrder->arrival_date = Carbon::createFromTimestamp($args['arrival_date'])->format('Y-m-d');
        $purchaseOrder->status_id = 1;
        $purchaseOrder->save();
        $createdPurchaseOrder = $purchaseOrder->refresh();

        if ($createdPurchaseOrder) {
            return [
                'success' => true,
                'message' => "Purchase order created successfully",
                'purchaseOrder' => $createdPurchaseOrder,
            ];
        } else {
            return [
                'success' => false,
                'message' => "Failed to create purchase order, Please try again later!",
                'purchaseOrder' => null,
            ];
        }
    }
}
