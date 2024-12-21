<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use ApiTrait;

    public function index()
    {
        return $this->sendResponse('Data retrieved successfully', data: [
            'not_uploaded' => 2,
            'uploaded' => 1,
            'verified' => 2,
        ]);
    }
}
