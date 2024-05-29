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
            'driver_name' => [
                'name' => 'driver_name',
                'type' => Type::string(),
            ],
            'rep_name' => [
                'name' => 'rep_name',
                'type' => Type::string(),
            ],
            'driver_phone' => [
                'name' => 'driver_phone',
                'type' => Type::string(),
            ],
            'rep_phone' => [
                'name' => 'rep_phone',
                'type' => Type::string(),
            ],
            'arrival_date' => [
                'name' => 'arrival_date',
                'type' => Type::string(),
            ],
            'arrived_at' => [
                'name' => 'arrived_at',
                'type' => Type::string(),
            ],
            'entrance_time' => [
                'name' => 'entrance_time',
                'type' => Type::string(),
            ],
            'unloaded_at' => [
                'name' => 'unloaded_at',
                'type' => Type::string(),
            ],
            'left_at' => [
                'name' => 'left_at',
                'type' => Type::string(),
            ],
            'status_id' => [
                'name' => 'status_id',
                'type' => Type::int(),
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
        if (isset($args['purchase_order_number'])) {
            return $query->where('purchase_order_number', '=', $args['purchase_order_number'])->first();
        }
        if (isset($args['invoice_number'])) {
            return $query->where('invoice_number', '=', $args['invoice_number'])->first();
        }

        return null;
    }
}
