<?php

namespace App\Http\Controllers\Api;

use App\Http\Traits\Api\ApiResponse;
use App\Http\Traits\Api\ApiValidation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Custom traits
    use ApiValidation, ApiResponse;
}
