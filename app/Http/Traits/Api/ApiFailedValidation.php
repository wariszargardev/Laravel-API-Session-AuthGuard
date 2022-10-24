<?php
namespace App\Http\Traits\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ApiFailedValidation {

    function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation errors',
            'error' => $validator->errors()->first(),
            'errors' => $validator->errors(),
        ]));
    }

}
