<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ErrorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Error',
        'description' => 'An error that occurred during the operation',
    ];

    public function fields(): array
    {
        return [
            'field' => [
                'type' => Type::string(),
                'description' => 'The field where the error occurred',
            ],
            'message' => [
                'type' => Type::string(),
                'description' => 'A message describing the error',
            ],
        ];
    }
}
