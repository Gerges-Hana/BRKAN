<?php

namespace App\GraphQL\Query\PurchaseOrder;

use Closure;
use App\Models\PurchaseOrder;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class PurchaseOrdersQuery extends Query
{
    protected $attributes = [
        'name' => 'PurchaseOrdersQuery'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('PurchaseOrder'));
    }

    public function args(): array
    {
        return [
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

        if (isset($args['purchase_order_number'])) {
            $query->whereRaw('LOWER(purchase_order_number) LIKE ?', ['%' . strtolower($args['purchase_order_number']) . '%']);
        }
        if (isset($args['invoice_number'])) {
            $query->whereRaw('LOWER(invoice_number) LIKE ?', ['%' . strtolower($args['invoice_number']) . '%']);
        }
        if (isset($args['driver_name'])) {
            $query->whereRaw('LOWER(driver_name) LIKE ?', ['%' . strtolower($args['driver_name']) . '%']);
        }
        if (isset($args['rep_name'])) {
            $query->whereRaw('LOWER(rep_name) LIKE ?', ['%' . strtolower($args['rep_name']) . '%']);
        }
        if (isset($args['driver_phone'])) {
            $query->whereRaw('LOWER(driver_phone) LIKE ?', ['%' . strtolower($args['driver_phone']) . '%']);
        }
        if (isset($args['rep_phone'])) {
            $query->whereRaw('LOWER(rep_phone) LIKE ?', ['%' . strtolower($args['rep_phone']) . '%']);
        }
        if (isset($args['arrival_date'])) {
            $query->whereRaw('LOWER(arrival_date) LIKE ?', ['%' . strtolower($args['arrival_date']) . '%']);
        }
        if (isset($args['arrived_at'])) {
            $query->whereRaw('LOWER(arrived_at) LIKE ?', ['%' . strtolower($args['arrived_at']) . '%']);
        }
        if (isset($args['entrance_time'])) {
            $query->whereRaw('LOWER(entrance_time) LIKE ?', ['%' . strtolower($args['entrance_time']) . '%']);
        }
        if (isset($args['unloaded_at'])) {
            $query->whereRaw('LOWER(unloaded_at) LIKE ?', ['%' . strtolower($args['unloaded_at']) . '%']);
        }
        if (isset($args['left_at'])) {
            $query->whereRaw('LOWER(left_at) LIKE ?', ['%' . strtolower($args['left_at']) . '%']);
        }
        if (isset($args['status_id'])) {
            $query->where('status_id', '=', $args['status_id']);
        }

        return $query->get();
    }
}
