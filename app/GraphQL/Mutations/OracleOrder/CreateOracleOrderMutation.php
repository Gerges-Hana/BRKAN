<?php

namespace App\GraphQL\Mutations\OracleOrder;

use App\Helpers\ValidationHelper;
use App\Models\OracleOrder;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateOracleOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateOracleOrder',
    ];

    public function type(): Type
    {
        return GraphQL::type('OracleOrderResponse');
    }

    public function args(): array
    {
        return [
            'purchase_order_number' => [
                'type' => Type::nonNull(Type::string()),
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

        $oracleOrder = OracleOrder::query()
            ->where('purchase_order_number', '=', $args['purchase_order_number'])
            ->first();

        if ($oracleOrder) {
            return [
                'success' => false,
                'message' => "تم إنشاء الطلب من قبل",
                'oracle_order' => $oracleOrder,
            ];
        }

        $oracleOrder = new OracleOrder();
        $oracleOrder->fill($args);
        $oracleOrder->save();
        $createdOracleOrder = $oracleOrder->refresh();

        if ($createdOracleOrder) {
            return [
                'success' => true,
                'message' => "تم إنشاء الطلب بنجاح",
                'oracle_order' => $createdOracleOrder,
            ];
        } else {
            return [
                'success' => false,
                'message' => "فشل في إنشاء رقم الطلبية، يرجى المحاولة مرة أخرى في وقت لاحق!",
                'oracle_order' => null,
            ];
        }
    }
}
