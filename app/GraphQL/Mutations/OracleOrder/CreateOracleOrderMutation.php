<?php

namespace App\GraphQL\Mutations\OracleOrder;

use App\Models\OracleOrder;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateOracleOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateOracleOrder',
    ];

    public function type(): Type
    {
        return GraphQL::type('OracleOrderResponse');
    }

    public function args(): array
    {
        return [
            'purchase_order_number' => [
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args): array
    {
        $oracleOrder = OracleOrder::query()
            ->where('purchase_order_number', '=', $args['purchase_order_number'])
            ->first();

        if ($oracleOrder) {
            return [
                'success' => false,
                'message' => "Oracle order already created before",
                'oracle_order' => $oracleOrder,
            ];
        }

        $oracleOrder = new OracleOrder();
        $oracleOrder->fill($args);
        $oracleOrder->save();
        $createdOracleOrder = $oracleOrder->refresh();

        if ($createdOracleOrder) {
            return [
                'success' => true,
                'message' => "Oracle order created successfully",
                'oracle_order' => $createdOracleOrder,
            ];
        } else {
            return [
                'success' => false,
                'message' => "Failed to create oracle order, Please try again later!",
                'oracle_order' => null,
            ];
        }
    }
}
