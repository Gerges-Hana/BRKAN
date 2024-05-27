<?php

namespace App\GraphQL\Types;

use App\Models\PurchaseOrder;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PurchaseOrderType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PurchaseOrderType',
        'description' => 'Purchase Order',
        'model' => PurchaseOrder::class
    ];

    public function fields(): array
    {
        return [
            'purchase_order_number' => [
                'type' => Type::string(),
                'description' => 'The number of the purchase order'
            ],
            'invoice_number' => [
                'type' => Type::string(),
                'description' => 'The invoice number of the purchase order'
            ],
            'driver_name' => [
                'type' => Type::string(),
                'description' => 'The driver name of the purchase order'
            ],
            'rep_name' => [
                'type' => Type::string(),
                'description' => 'The representative name of the purchase order'
            ],
            'driver_phone' => [
                'type' => Type::string(),
                'description' => 'The driver phone of the purchase order'
            ],
            'rep_phone' => [
                'type' => Type::string(),
                'description' => 'The representative phone of the purchase order'
            ],
            'arrival_date' => [
                'type' => Type::string(),
                'description' => 'The arrival date of the purchase order which entered by the driver'
            ],
            'arrived_at' => [
                'type' => Type::string(),
                'description' => 'The arrival time of the purchase order which set when the security verify the PO'
            ],
            'entrance_time' => [
                'type' => Type::string(),
                'description' => 'The entrance time of the purchase order which entered by the admin'
            ],
            'unloaded_at' => [
                'type' => Type::string(),
                'description' => 'The unloading time of the purchase order which entered by the admin'
            ],
            'left_at' => [
                'type' => Type::string(),
                'description' => 'The leaving time of the purchase order which entered by the admin'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'The date the purchase order was created',
//                'resolve' => function ($model) {
//                    return $model->created_at ?: '';
//                }
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'The date the purchase order was last updated',
//                'resolve' => function ($model) {
//                    return $model->updated_at ?: '';
//                }
            ],
            'status' => [
                'type' => GraphQL::type('PurchaseOrderStatus'),
            ]
        ];
    }
}
