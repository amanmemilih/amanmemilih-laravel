<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PresidentialCandidat;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class PresidentialCandidatController extends Controller
{
    use ApiTrait;

    public function index()
    {
        $data = PresidentialCandidat::get();
        return $this->sendResponse('Data successfully retrieved', data: $data);
    }
}
