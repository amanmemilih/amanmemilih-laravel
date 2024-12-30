<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DashboardRepository;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use ApiTrait;

    protected $repository;

    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $data = $this->repository->getData();
        return $this->sendResponse('Data retrieved successfully', data: $data);
    }
}
