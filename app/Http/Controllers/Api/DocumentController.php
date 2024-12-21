<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PresidentialDocument;
use App\Models\PresidentialVote;
use App\Traits\ApiTrait;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JsonException;

class DocumentController extends Controller
{
    use ApiTrait, FileUploadTrait;

    public function store(Request $request)
    {
        $request->validate([
            'election_type' => 'required|in:presidential,dpr,province,district,subdistrict',
            'documents' => 'required|array|min:1',
            'documents.*' => 'mimes:jpeg,jpg,png|required|distinct|min:1',
            'vote' => 'required|array',
            'vote.*.candidat_id' => 'required|exists:candidats,id',
            'vote.*.total_votes' => 'required|integer',
        ]);

        $user = Auth::user();
        DB::beginTransaction();

        switch ($request->election_type) {
            case 'presidential':
                $documentC1 = [];

                foreach ($request->documents as $row) {
                    $fileLocation = $this->uploadFileFromRequest($row, "C1DOCS-{$user->id}", 'c1/presidential');
                    array_push($documentC1, $fileLocation);
                }

                $documentId = PresidentialDocument::create([
                    'document_c1' => json_encode($documentC1),
                    'user_id' => $user->id,
                ]);

                foreach ($request->vote as $row) {
                    PresidentialVote::create([
                        'presidential_document_id' => $documentId->id,
                        'candidat_id' => $row['candidat_id'],
                        'total_votes' => $row['total_votes'],
                    ]);
                }
                break;

            default:
                return $this->sendResponse('Invalid election type', code: 400);
                break;
        }

        DB::commit();
        return $this->sendResponse('Document uploaded successfully');
    }
}
