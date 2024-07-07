<?php

namespace App\GraphQL\Mutations\PurchaseOrder;

use App\Helpers\ValidationHelper;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderUpdate;
use Carbon\Carbon;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CancelPurchaseOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CancelPurchaseOrder',
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
                'description' => 'The unique key for the driver device'
            ],
        ];
    }

    public function resolve($root, $args): array
    {
        $rules = [
            'device_unique_key' => 'required|min:6|max:255',
        ];
        $messages = [
            'device_unique_key.required' => 'رقم الجهاز مطلوب',
            'device_unique_key.min' => 'يجب الا يقل رقم الجهاز عن 6 ارقام او حروف',
            'device_unique_key.max' => 'يجب الا يزيد رقم الجهاز عن 255 رقم او حرف',
        ];
        $errors = ValidationHelper::validate($args, $rules, $messages);
        if ($errors) {
            return [
                'success' => false,
                'message' => 'يوجد أخطاء فى المدخلات',
                'errors' => $errors,
                'oracle_order' => null,
            ];
        }

//        $purchaseOrder = PurchaseOrder::query()
//            ->where('device_unique_key', '=', $args['device_unique_key'])
//            ->first();

        $purchaseOrder = PurchaseOrder::query()
            ->where('device_unique_key', '=', $args['device_unique_key'])
            ->where('status_id', '=', 1)
            ->first();

        if (!$purchaseOrder) {
            return [
                'success' => false,
                'message' => 'لم يتم العثور على الطلبية',
                'purchase_order' => $purchaseOrder,
            ];
        }

        if ($purchaseOrder->status_id == 2) {
            return [
                'success' => false,
                'message' => 'تم الغاء الطلبية بالفعل',
                'purchase_order' => $purchaseOrder,
            ];
        }

        $datetime = Carbon::now()->format('Y-m-d H:i:s');
        $updatedPurchaseOrder = $purchaseOrder->update([
            'status_id' => 2,
            'updated_at' => $datetime
        ]);
        $purchaseOrder->refresh();

        if ($updatedPurchaseOrder) {
            $purchaseOrderUpdate = new PurchaseOrderUpdate();
            $purchaseOrderUpdate->purchase_order_id = $purchaseOrder->id;
            $purchaseOrderUpdate->status_id = 2;
            $purchaseOrderUpdate->created_at = $datetime;
            $purchaseOrderUpdate->save();

            return [
                'success' => true,
                'message' => 'تم الغاء الطلبية بنجاح',
                'purchase_order' => $purchaseOrder,
            ];
        } else {
            return [
                'success' => false,
                'message' => 'فشل فى الغاء الطلبية من فضلك حاول مرة اخرى',
                'purchase_order' => $purchaseOrder,
            ];
        }
    }
}
