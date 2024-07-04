<?php

namespace App\GraphQL\Mutations\PurchaseOrder;

use App\Helpers\ValidationHelper;
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
        $rules = [
            'device_unique_key' => 'required|min:6|max:255',
            'purchase_order_number' => 'required|min:6|max:255',
            'invoice_number' => 'required|min:6|max:255',
            'driver_name' => 'required|min:3|max:255',
            'rep_name' => 'required|min:3|max:255',
            'driver_phone' => 'required|min:6|max:11',
            'rep_phone' => 'required|min:6|max:11',
            'arrival_date' => 'required',
        ];
        $messages = [
            'device_unique_key.required' => 'رقم الجهاز مطلوب',
            'device_unique_key.min' => 'يجب الا يقل رقم الجهاز عن 6 ارقام او حروف',
            'device_unique_key.max' => 'يجب الا يزيد رقم الجهاز عن 255 رقم او حرف',

            'purchase_order_number.required' => 'رقم الطلبية مطلوب',
            'purchase_order_number.min' => 'يجب الا يقل رقم الطلبية عن 6 ارقام او حروف',
            'purchase_order_number.max' => 'يجب الا يزيد رقم الطلبية عن 255 رقم او حرف',

            'invoice_number.required' => 'رقم الفاتورة مطلوب',
            'invoice_number.min' => 'يجب الا يقل رقم الفاتورة عن 6 ارقام او حروف',
            'invoice_number.max' => 'يجب الا يزيد رقم الفاتورة عن 255 رقم او حرف',

            'driver_name.required' => 'اسم السائق مطلوب',
            'driver_name.min' => 'يجب الا يقل اسم السائق عن 3 حروف',
            'driver_name.max' => 'يجب الا يزيد اسم السائق عن 255 حرف',

            'rep_name.required' => 'اسم المندوب مطلوب',
            'rep_name.min' => 'يجب الا يقل اسم المندوب عن 3 حروف',
            'rep_name.max' => 'يجب الا يزيد اسم المندوب عن 255 حرف',

            'driver_phone.required' => 'هاتف السائق مطلوب',
            'driver_phone.min' => 'يجب الا يقل هاتف السائق عن 6 ارقام',
            'driver_phone.max' => 'يجب الا يزيد هاتف السائق عن 11 رقم',

            'rep_phone.required' => 'هاتف المندوب مطلوب',
            'rep_phone.min' => 'يجب الا يقل هاتف المندوب عن 6 ارقام',
            'rep_phone.max' => 'يجب الا يزيد هاتف المندوب عن 11 رقم',

            'arrival_date.required' => 'تاريخ الوصول المتوقع مطلوب',
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
            ->where('status_id', '!=', 6) // Not Left
            ->first();
        if ($currentNotCanceledPurchaseOrderForCurrentDevice) {
            return [
                'success' => false,
                'message' => 'يوجد لديك طلبية بالفعل, قم بإكمال الطلبية او الغائها اولا حتى تتمكن من انشاء طلبية اخرى',
                'purchase_order' => $currentNotCanceledPurchaseOrderForCurrentDevice,
            ];
        }

        //Create new purchase order
        $arrival_date = strlen($args['arrival_date']) == 10 ? (int)$args['arrival_date'] * 1000 : $args['arrival_date'];
        $datetime = Carbon::now()->format('Y-m-d H:i:s');
        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->fill($args);
        $purchaseOrder->arrival_date = Carbon::createFromTimestampMs($arrival_date)->format('Y-m-d');
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
