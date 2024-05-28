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
        return GraphQL::type('PurchaseOrder');
    }

    public function args(): array
    {
        return [
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

    public function resolve($root, $args): PurchaseOrder
    {
        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->fill($args);
        $purchaseOrder->arrival_date = Carbon::createFromTimestamp($args['arrival_date'])->format('Y-m-d');
        $purchaseOrder->status_id = 1;
        $purchaseOrder->save();
        return $purchaseOrder;
    }
}
