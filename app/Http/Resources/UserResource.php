<?php

namespace App\Http\Resources;

use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'address' => $this->address,
            'village' => $this->village->name,
            'subdistrict' => $this->village->subdistrict->name,
            'district' => $this->village->subdistrict->district->name,
            'province' => $this->village->subdistrict->district->province->name,
            'region' => "{$this->address}, {$this->village->name}, {$this->village->subdistrict->name}, {$this->village->subdistrict->district->name}, {$this->village->subdistrict->district->province->name}",
            'created_at' => $this->created_at,
        ];
    }
}
