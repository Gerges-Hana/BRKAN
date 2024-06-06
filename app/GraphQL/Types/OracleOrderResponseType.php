<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class OracleOrderResponseType extends GraphQLType
{
    protected $attributes = [
        'name' => 'OracleOrderResponse',
        'description' => 'Oracle Order Response',
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
            'oracle_order' => [
                'type' => GraphQL::type('OracleOrder'),
                'description' => 'The oracle order response'
            ],
        ];
    }
}
