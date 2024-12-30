<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DpdDocument;
use App\Models\DprdDistrictDocument;
use App\Models\DprDocument;
use App\Models\DprdProvinceDocument;
use App\Models\PresidentialDocument;
use App\Models\PresidentialVote;
use App\Traits\ApiTrait;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    use ApiTrait, FileUploadTrait;

    public function index()
    {
        $userId = Auth::id();

        // Array of document models with names
        $documents = [
            ['model' => PresidentialDocument::class, 'name' => 'PILPRES'],
            ['model' => DprDocument::class, 'name' => 'PILEG DPR'],
            ['model' => DprdProvinceDocument::class, 'name' => 'PILEG DPRD PROVINSI'],
            ['model' => DprdDistrictDocument::class, 'name' => 'PILEG DPRD KAB/KOTA'],
            ['model' => DpdDocument::class, 'name' => 'PEMILU DPD'],
        ];

        $results = [];

        foreach ($documents as $docInfo) {
            $doc = $docInfo['model']::where('user_id', $userId)->first();

            if ($doc) {
                $status = $doc->status == 1 ? 2 : 1; // 2: Verified, 1: Uploaded but not verified
            } else {
                $status = 0; // 0: Not uploaded
            }

            $results[] = [
                'id' => @$doc->id ?? null,
                'name' => $docInfo['name'],
                'status' => $status,
            ];
        }

        return $this->sendResponse('data successfully retrieved', data: $results);
    }

    public function show(int $id, Request $request)
    {
        $request->validate([
            'election_type' => 'required|in:presidential,dpr,dprd_province,dprd_district,dpd',
        ]);

        switch ($request->election_type) {
            case 'presidential':
                $data = PresidentialDocument::with('presidential_votes')->findOrfail($id);
                break;
            case 'dpr':
                $data = DprDocument::findOrfail($id);
                break;
            case 'dprd_province':
                $data = DprdProvinceDocument::findOrfail($id);
                break;
            case 'dprd_district':
                $data = DprdDistrictDocument::findOrfail($id);
                break;
            case 'dpd':
                $data = DpdDocument::findOrfail($id);
                break;
            default:
                return $this->sendResponse('Invalid election type', code: 400);
                break;
        }

        $electionType = '';
        if ($request->election_type == 'presidential') $electionType = 'PILPRES';
        if ($request->election_type == 'dpr') $electionType = 'PILEG DPR';
        if ($request->election_type == 'dprd_province') $electionType = 'PILEG DPRD PROVINSI';
        if ($request->election_type == 'dprd_district') $electionType = 'PILEG DPRD KAB/KOTA';
        if ($request->election_type == 'dpd') $electionType = 'PEMILU DPD';

        return $this->sendResponse('success', data: [
            'status' => $data->status,
            'election_type' => $electionType,
            'votes' => $data->presidential_votes,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'election_type' => 'required|in:presidential,dpr,dprd_province,dprd_district,dpd',
            'documents' => 'required|array|min:1',
            'documents.*' => 'mimes:jpeg,jpg,png|required|distinct|min:1',
        ]);

        $user = Auth::user();
        DB::beginTransaction();

        switch ($request->election_type) {
            case 'presidential':
                $request->validate([
                    'vote' => 'required|array',
                    'vote.*.candidat_id' => 'required|exists:presidential_candidats,id',
                    'vote.*.total_votes' => 'required|integer',
                ]);

                $documentC1 = [];

                $index = 1;
                foreach ($request->documents as $row) {
                    $fileLocation = $this->uploadFileFromRequest($row, "C1DOCS-{$user->id}-$index", 'c1/presidential');
                    array_push($documentC1, $fileLocation);
                    $index++;
                }

                $documentId = PresidentialDocument::create([
                    'document_c1' => json_encode($documentC1),
                    'user_id' => $user->id,
                ]);

                foreach ($request->vote as $row) {
                    PresidentialVote::create([
                        'presidential_document_id' => $documentId->id,
                        'presidential_candidat_id' => $row['candidat_id'],
                        'total_votes' => $row['total_votes'],
                    ]);
                }
                break;
            case 'dpr':
                $documentC1 = [];

                $index = 1;
                foreach ($request->documents as $row) {
                    $fileLocation = $this->uploadFileFromRequest($row, "C1DOCS-{$user->id}-$index", 'c1/dpr');
                    array_push($documentC1, $fileLocation);
                    $index++;
                }

                $documentId = DprDocument::create([
                    'document_c1' => json_encode($documentC1),
                    'user_id' => $user->id,
                ]);
                break;
            case 'dprd_province':
                $documentC1 = [];

                $index = 1;
                foreach ($request->documents as $row) {
                    $fileLocation = $this->uploadFileFromRequest($row, "C1DOCS-{$user->id}-$index", 'c1/dprd_province');
                    array_push($documentC1, $fileLocation);
                    $index++;
                }

                $documentId = DprdProvinceDocument::create([
                    'document_c1' => json_encode($documentC1),
                    'user_id' => $user->id,
                ]);
                break;
            case 'dprd_district':
                $documentC1 = [];

                $index = 1;
                foreach ($request->documents as $row) {
                    $fileLocation = $this->uploadFileFromRequest($row, "C1DOCS-{$user->id}-$index", 'c1/dprd_district');
                    array_push($documentC1, $fileLocation);
                    $index++;
                }

                $documentId = DprdDistrictDocument::create([
                    'document_c1' => json_encode($documentC1),
                    'user_id' => $user->id,
                ]);
                break;
            case 'dpd':
                $documentC1 = [];

                $index = 1;
                foreach ($request->documents as $row) {
                    $fileLocation = $this->uploadFileFromRequest($row, "C1DOCS-{$user->id}-$index", 'c1/dpd');
                    array_push($documentC1, $fileLocation);
                    $index++;
                }

                $documentId = DpdDocument::create([
                    'document_c1' => json_encode($documentC1),
                    'user_id' => $user->id,
                ]);
                break;

            default:
                return $this->sendResponse('Invalid election type', code: 400);
                break;
        }

        DB::commit();
        return $this->sendResponse('Document uploaded successfully');
    }
}
