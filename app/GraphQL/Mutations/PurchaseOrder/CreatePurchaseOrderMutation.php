<?php

namespace App\GraphQL\Mutations\PurchaseOrder;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderUpdate;
use Carbon\Carbon;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreatePurchaseOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreatePurchaseOrder',
    ];

    public function type(): Type
    {
        return GraphQL::type('PurchaseOrderResponse');
    }

    public function args(): array
    {
        return [
            'device_unique_key' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'purchase_order_number' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'invoice_number' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'driver_name' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'rep_name' => [
                'type' => Type::string(),
            ],
            'driver_phone' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'rep_phone' => [
                'type' => Type::string(),
            ],
            'arrival_date' => [
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args): array
    {
        $currentNotCanceledPurchaseOrder = PurchaseOrder::query()
            ->where('purchase_order_number', '=', $args['purchase_order_number'])
            ->where('status_id', '!=', 2) // Not Canceled
            ->first();

        if ($currentNotCanceledPurchaseOrder) {
            if ($currentNotCanceledPurchaseOrder->device_unique_key == $args['device_unique_key']) {
                return [
                    'success' => false,
                    'message' => 'تم اضافة الطلبية من قبل',
                    'purchase_order' => $currentNotCanceledPurchaseOrder,
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'تم انشاء الطلبية بالفعل من قبل بواسطة سائق اخر',
                    'purchase_order' => null,
                ];
            }
        }

        $currentNotCanceledPurchaseOrderForCurrentDevice = PurchaseOrder::query()
            ->where('device_unique_key', '=', $args['device_unique_key'])
            ->where('status_id', '!=', 2) // Not Canceled
            ->first();
        if ($currentNotCanceledPurchaseOrderForCurrentDevice) {
            return [
                'success' => false,
                'message' => 'يوجد لديك طلبية بالفعل, قم بإكمال الطلبية او الغائها اولا حتى تتمكن من انشاء طلبية اخرى',
                'purchase_order' => $currentNotCanceledPurchaseOrderForCurrentDevice,
            ];
        }

        //Create new purchase order
        $datetime = Carbon::now()->format('Y-m-d H:i:s');
        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->fill($args);
        $purchaseOrder->arrival_date = Carbon::createFromTimestampMs($args['arrival_date'])->format('Y-m-d');
        $purchaseOrder->status_id = 1;
        $purchaseOrder->created_at = $datetime;
        $purchaseOrder->save();
        $createdPurchaseOrder = $purchaseOrder->refresh();

        $purchaseOrderUpdate = new PurchaseOrderUpdate();
        $purchaseOrderUpdate->purchase_order_id = $createdPurchaseOrder->id;
        $purchaseOrderUpdate->status_id = 1;
        $purchaseOrderUpdate->created_at = $datetime;
        $purchaseOrderUpdate->save();

        if ($createdPurchaseOrder) {
            return [
                'success' => true,
                'message' => "تم انشاء الطلبية بنجاح",
                'purchase_order' => $createdPurchaseOrder,
            ];
        } else {
            return [
                'success' => false,
                'message' => "فشل فى انشاء الطلبية, برجاء المحاولة فى وقت لاحق!",
                'purchase_order' => null,
            ];
        }
    }
}
