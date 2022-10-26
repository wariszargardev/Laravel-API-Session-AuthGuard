<?php

namespace App\Services;

use App\Http\Traits\Api\ApiResponse;
use App\Http\Traits\Api\ApiValidation;

abstract class AbstractService
{
    use ApiResponse, ApiValidation;
}
