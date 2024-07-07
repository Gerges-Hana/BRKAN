<?php

namespace App\GraphQL\Mutations\PurchaseOrder;

use App\Helpers\ValidationHelper;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderUpdate;
use Carbon\Carbon;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class VerifyPurchaseOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'VerifyPurchaseOrder',
    ];

    public function type(): Type
    {
        return GraphQL::type('PurchaseOrderResponse');
    }

    public function args(): array
    {
        return [
            'purchase_order_number' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The number of the purchase order'
            ],
        ];
    }

    public function resolve($root, $args): array
    {
        $rules = [
            'purchase_order_number' => 'required|min:6|max:255',
        ];
        $messages = [
            'purchase_order_number.required' => 'رقم الطلبية مطلوب',
            'purchase_order_number.min' => 'يجب الا يقل رقم الطلبية عن 6 ارقام او حروف',
            'purchase_order_number.max' => 'يجب الا يزيد رقم الطلبية عن 255 رقم او حرف',
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

        $purchaseOrder = PurchaseOrder::query()
            ->where('purchase_order_number', '=', $args['purchase_order_number'])
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
                'message' => 'هذه الطلبية تم الغاؤها ولا يمكن تأكيد وصولها',
                'purchase_order' => $purchaseOrder,
            ];
        }

        if ($purchaseOrder->status_id == 3) {
            return [
                'success' => false,
                'message' => 'تم تأكيد وصول هذه الطلبية من قبل',
                'purchase_order' => $purchaseOrder,
            ];
        }

        $datetime = Carbon::now()->format('Y-m-d H:i:s');
        $updatedPurchaseOrder = $purchaseOrder->update([
            'status_id' => 3,
            'updated_at' => $datetime
        ]);
        $purchaseOrder->refresh();

        if ($updatedPurchaseOrder) {
            $purchaseOrderUpdate = new PurchaseOrderUpdate();
            $purchaseOrderUpdate->purchase_order_id = $purchaseOrder->id;
            $purchaseOrderUpdate->status_id = 3;
            $purchaseOrderUpdate->created_at = $datetime;
            $purchaseOrderUpdate->save();

            return [
                'success' => true,
                'message' => 'تم تأكيد وصول الطلبية',
                'purchase_order' => $purchaseOrder,
            ];
        } else {
            return [
                'success' => false,
                'message' => 'فضل فى تأكيد وصول الطلبية, من فضل حاول مرة اخرى',
                'purchase_order' => $purchaseOrder,
            ];
        }
    }
}
