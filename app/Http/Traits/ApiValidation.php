<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Validator;

trait ApiValidation {
    public $validationArray = array(
        'validationKey'=> [
            // Validation Rules
        ],
    );

    public function validateData($request, $validation){
        $validator = Validator::make($request->all(),$this->validationArray[$validation]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages()->first()
            ], 400);
        } else {
            return true;
        }
    }
}
