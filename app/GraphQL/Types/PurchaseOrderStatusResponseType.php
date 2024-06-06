<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PurchaseOrderStatusResponseType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PurchaseOrderStatusResponse',
        'description' => 'Purchase Order Status Response',
    ];

    public function fields(): array
    {
        return [
            'success' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'Indicates if the operation was successful',
            ],
            'message' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'A message about the operation',
            ],
            'purchase_order_status' => [
                'type' => GraphQL::type('PurchaseOrderStatus'),
            ],
            'purchase_order_statuses' => [
                'type' => Type::listOf(GraphQL::type('PurchaseOrderStatus')),
            ],
        ];
    }
}
