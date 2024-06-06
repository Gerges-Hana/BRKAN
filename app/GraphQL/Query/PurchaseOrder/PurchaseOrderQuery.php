<?php

namespace App\GraphQL\Query\PurchaseOrder;

use Closure;
use App\Models\PurchaseOrder;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class PurchaseOrderQuery extends Query
{
    protected $attributes = [
        'name' => 'PurchaseOrderQuery',
    ];

    public function type(): Type
    {
        return GraphQL::type('PurchaseOrder');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'purchase_order_number' => [
                'name' => 'purchase_order_number',
                'type' => Type::string(),
            ],
            'invoice_number' => [
                'name' => 'invoice_number',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();
        $query = PurchaseOrder::query()->select($select)->with($with);

        if (isset($args['id'])) {
            return $query->find($args['id']);
        }
        if (isset($args['device_unique_key'])) {
            return $query->where('device_unique_key', '=', $args['device_unique_key'])->first();
        }
        if (isset($args['purchase_order_number'])) {
            return $query->where('purchase_order_number', '=', $args['purchase_order_number'])->first();
        }
        if (isset($args['invoice_number'])) {
            return $query->where('invoice_number', '=', $args['invoice_number'])->first();
        }

        return null;
    }
}
