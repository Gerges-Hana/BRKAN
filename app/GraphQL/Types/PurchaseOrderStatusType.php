<?php

namespace App\GraphQL\Types;

use App\Models\PurchaseOrderStatus;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PurchaseOrderStatusType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PurchaseOrderStatus',
        'description' => 'Purchase Order Status',
        'model' => PurchaseOrderStatus::class
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the purchase order status'
            ],
            'is_active' => [
                'type' => Type::boolean(),
                'description' => 'The active status of the purchase order status'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'The date the purchase order status was created',
//                'resolve' => function ($model) {
//                    return $model->created_at ?: '';
//                }
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'The date the purchase order status was last updated',
//                'resolve' => function ($model) {
//                    return $model->updated_at ?: '';
//                }
            ],
        ];
    }
}
