<?php

namespace App\GraphQL\Query\OracleOrder;

use App\Models\OracleOrder;
use Closure;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class OracleOrderQuery extends Query
{
    protected $attributes = [
        'name' => 'PurchaseOrderQuery',
    ];

    public function type(): Type
    {
        return GraphQL::type('OracleOrderResponse');
    }

    public function args(): array
    {
        return [
            'purchase_order_number' => [
                'name' => 'purchase_order_number',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $query = OracleOrder::query();

        $oracleOrder = null;
        if (isset($args['purchase_order_number'])) {
            $oracleOrder = $query->where('purchase_order_number', '=', $args['purchase_order_number'])->first();
        }

        if ($oracleOrder) {
            return [
                'success' => true,
                'message' => 'Oracle order details',
                'oracle_order' => $oracleOrder
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Oracle order not found',
                'oracle_order' => null
            ];
        }
    }
}
