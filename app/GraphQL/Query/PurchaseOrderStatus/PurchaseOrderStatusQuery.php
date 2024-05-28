<?php

namespace App\GraphQL\Query\PurchaseOrderStatus;

use App\Models\PurchaseOrderStatus;
use Closure;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class PurchaseOrderStatusQuery extends Query
{
    protected $attributes = [
        'name' => 'PurchaseOrderStatusQuery',
    ];

    public function type(): Type
    {
        return GraphQL::type('PurchaseOrderStatus');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
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
        $query = PurchaseOrderStatus::query()->select($select)->with($with);

        if (isset($args['id'])) {
            return $query->find($args['id']);
        }
        if (isset($args['name'])) {
            return $query->where('name', '=', $args['name'])->first();
        }
        if (isset($args['is_active'])) {
            return $query->where('is_active', '=', $args['is_active'])->first();
        }

        return null;
    }
}
