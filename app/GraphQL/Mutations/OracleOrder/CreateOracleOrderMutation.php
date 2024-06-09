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
                'message' => "تم إنشاء الطلب من قبل",
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
                'message' => "تم إنشاء الطلب بنجاح",
                'oracle_order' => $createdOracleOrder,
            ];
        } else {
            return [
                'success' => false,
                'message' => "فشل في إنشاء رقم الطلبية، يرجى المحاولة مرة أخرى في وقت لاحق!",
                'oracle_order' => null,
            ];
        }
    }
}
