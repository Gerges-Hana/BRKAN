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
//        return Type::listOf(GraphQL::type('PurchaseOrder'));
        return GraphQL::type('PurchaseOrderResponse');
    }

    public function args(): array
    {
        return [
            'device_unique_key' => [
                'name' => 'device_unique_key',
                'type' => Type::string(),
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
        $query = PurchaseOrder::query()/*->select($select)*/ ->with($with);

        if (isset($args['device_unique_key'])) {
            $query->whereRaw('LOWER(device_unique_key) LIKE ?', ['%' . strtolower($args['device_unique_key']) . '%']);
        }
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
        if (isset($args['status_id'])) {
            $query->where('status_id', '=', $args['status_id']);
        }

        return [
            'success' => true,
            'message' => 'Purchase orders list',
            'purchase_orders' => $query->get()
        ];
    }
}
