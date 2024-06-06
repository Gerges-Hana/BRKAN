<?php

namespace App\GraphQL\Types;

use App\Models\OracleOrder;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class OracleOrderType extends GraphQLType
{
    protected $attributes = [
        'name' => 'OracleOrder',
        'description' => 'Oracle Order',
        'model' => OracleOrder::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the oracle order'
            ],
            'purchase_order_number' => [
                'type' => Type::string(),
                'description' => 'The number of the oracle order'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'The date the oracle order was created',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'The date the oracle order was last updated',
            ],
        ];
    }
}
