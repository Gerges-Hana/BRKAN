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
        return GraphQL::type('PurchaseOrderResponse');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
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
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();
        $query = PurchaseOrder::query()/*->select($select)*/ ->with($with)
            ->where('status_id', '!=', 2); // Not Canceled

        if (isset($args['id'])) {
            $query->find($args['id']);
        }
        if (isset($args['device_unique_key'])) {
            $query->where('device_unique_key', '=', $args['device_unique_key']);
        }
        if (isset($args['purchase_order_number'])) {
            $query->where('purchase_order_number', '=', $args['purchase_order_number']);
        }
        if (isset($args['invoice_number'])) {
            $query->where('invoice_number', '=', $args['invoice_number']);
        }

        $purchase_order = $query->first();
        if ($purchase_order) {
            return [
                'success' => true,
                'message' => 'تفاصيل الطلبية',
                'purchase_order' => $purchase_order
            ];
        } else {
            return [
                'success' => false,
                'message' => 'لم يتم العثور على الطلبية',
                'purchase_order' => null
            ];
        }
    }
}
