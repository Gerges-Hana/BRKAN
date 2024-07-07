<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator;

class ValidationHelper
{
    public static function validate($args, $rules, $messages): ?array
    {
        $validator = Validator::make($args, $rules, $messages);

        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->toArray() as $field => $messages) {
                foreach ($messages as $message) {
                    $errors[] = [
                        'field' => $field,
                        'message' => $message,
                    ];
                }
            }
            return $errors;
        }

        return null;
    }
}
