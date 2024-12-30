<?php

namespace App\Repositories;

use App\Models\DpdDocument;
use App\Models\DprdDistrictDocument;
use App\Models\DprDocument;
use App\Models\DprdProvinceDocument;
use App\Models\PresidentialDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardRepository
{
    public function getData()
    {
        $userId = Auth::id();

        $documents = [
            PresidentialDocument::class,
            DprDocument::class,
            DprdProvinceDocument::class,
            DprdDistrictDocument::class,
            DpdDocument::class,
        ];

        $notUploaded = 0;
        $uploaded = 0;
        $verified = 0;

        foreach ($documents as $document) {
            $doc = $document::where('user_id', $userId)->first();

            if ($doc) {
                if ($doc->status == 1) {
                    $verified++;
                } else {
                    $uploaded++;
                }
            } else {
                $notUploaded++;
            }
        }

        return [
            'not_uploaded' => $notUploaded,
            'uploaded' => $uploaded,
            'verified' => $verified,
        ];
    }
}
