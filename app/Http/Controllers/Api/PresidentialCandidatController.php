<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PresidentialCandidat;
use App\Models\PresidentialVote;
use App\Repositories\PresidentialCandidatRepository;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresidentialCandidatController extends Controller
{
    use ApiTrait;

    public function index()
    {
        $data = PresidentialCandidat::get();
        return $this->sendResponse('Data successfully retrieved', data: $data);
    }

    public function summary()
    {
        $totalVotes = PresidentialVote::sum('total_votes');
        $data = PresidentialCandidat::leftJoin('presidential_votes', 'presidential_votes.presidential_candidat_id', '=', 'presidential_candidats.id')
            ->select(
                'presidential_candidats.id',
                'presidential_candidats.name',
                'presidential_candidats.image',
                'presidential_candidats.no',
                DB::raw("COALESCE((SUM(presidential_votes.total_votes) / {$totalVotes}) * 100, 0) as vote_percentage")
            )
            ->groupBy('presidential_candidats.id', 'presidential_candidats.name', 'presidential_candidats.image', 'presidential_candidats.no')
            ->get();

        $data = array_map(function ($row) {
            return [
                'id' => $row['id'],
                'name' => $row['name'],
                'no' => $row['no'],
                'image' => asset('storage/' . $row['image']),
                'vote_percentage' => $row['vote_percentage'],
            ];
        }, $data->toArray());

        return $this->sendResponse('Data successfully retrieved', data: $data);
    }
}
