<?php

namespace App\GraphQL\Query\PurchaseOrderStatus;

use App\Models\PurchaseOrderStatus;
use Closure;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class PurchaseOrderStatusesQuery extends Query
{
    protected $attributes = [
        'name' => 'PurchaseOrderStatusesQuery'
    ];

    public function type(): Type
    {
//        return Type::listOf(GraphQL::type('PurchaseOrderStatus'));
        return GraphQL::type('PurchaseOrderStatusResponse');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'is_active' => [
                'name' => 'is_active',
                'type' => Type::boolean(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();
        $query = PurchaseOrderStatus::query()/*->select($select)*/ ->with($with);

        if (isset($args['name'])) {
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($args['name']) . '%']);
        }
        if (isset($args['is_active'])) {
            $query->where('is_active', '=', $args['is_active']);
        }

        return [
            'success' => true,
            'message' => 'Purchase order statuses list',
            'purchase_order_statuses' => $query->get()
        ];
    }
}
