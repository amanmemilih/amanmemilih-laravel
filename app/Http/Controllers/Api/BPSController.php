<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TPSResource;
use App\Models\District;
use App\Models\DpdDocument;
use App\Models\DprdDistrictDocument;
use App\Models\DprDocument;
use App\Models\DprdProvinceDocument;
use App\Models\PresidentialDocument;
use App\Models\Province;
use App\Models\Subdistrict;
use App\Models\Village;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class BPSController extends Controller
{
    use ApiTrait;

    public function province()
    {
        $data = Province::get();
        return $this->sendResponse('Data successfully retrieved', data: $data);
    }

    public function district($province)
    {
        $data = District::where('province_id', $province)->get();
        return $this->sendResponse('Data successfully retrieved', data: $data);
    }

    public function subdistrict($district)
    {
        $data = Subdistrict::where('district_id', $district)->get();
        return $this->sendResponse('Data successfully retrieved', data: $data);
    }

    public function village($subdistrict)
    {
        $data = Village::where('subdistrict_id', $subdistrict)->get();
        return $this->sendResponse('Data successfully retrieved', data: $data);
    }

    public function tps($village, Request $request)
    {
        $request->validate([
            'election_type' => 'required|in:presidential,dpr,dprd_province,dprd_district,dpd',
        ]);

        switch ($request->election_type) {
            case 'presidential':
                $data = PresidentialDocument::with('user')->whereHas('user', function ($query) use ($village) {
                    return $query->where('village_id', $village);
                })->get();
                break;
            case 'dpr':
                $data = DprDocument::with('user')->whereHas('user', function ($query) use ($village) {
                    return $query->where('village_id', $village);
                })->get();
                break;
            case 'dprd_province':
                $data = DprdProvinceDocument::with('user')->whereHas('user', function ($query) use ($village) {
                    return $query->where('village_id', $village);
                })->get();
                break;
            case 'dprd_district':
                $data = DprdDistrictDocument::with('user')->whereHas('user', function ($query) use ($village) {
                    return $query->where('village_id', $village);
                })->get();
                break;
            case 'dpd':
                $data = DpdDocument::with('user')->whereHas('user', function ($query) use ($village) {
                    return $query->where('village_id', $village);
                })->get();
                break;
            default:
                return $this->sendResponse('Invalid election type', code: 400);
                break;
        }

        return $this->sendResponse('TPS successfully verified', data: TPSResource::collection($data));
    }
}
