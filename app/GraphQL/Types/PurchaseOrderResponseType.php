<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PurchaseOrderResponseType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PurchaseOrderResponse',
        'description' => 'Purchase Order Response',
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
            'purchaseOrder' => [
                'type' => GraphQL::type('PurchaseOrder'),
            ],
        ];
    }
}
