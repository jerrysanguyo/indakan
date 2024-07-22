<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contestant;
use App\Models\Score;
use App\DataTables\AllDataTable;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(AllDataTable $dataTable)
    {
        $getAllContestants = Contestant::getAllContestants();

        $contestantsWithScores = $getAllContestants->map(function ($contestant) {
            $scores = Score::where('contestant_id', $contestant->id)->get();

            $criteriaScores = [];
            $overallScore = 0;
            $criteriaWeights = [
                1 => 0.4,
                2 => 0.3,
                3 => 0.2,
                4 => 0.1
            ];

            foreach ($scores as $score) {
                if (!isset($criteriaScores[$score->criteria_id])) {
                    $criteriaScores[$score->criteria_id] = [
                        'total' => 0,
                        'count' => 0
                    ];
                }

                $criteriaScores[$score->criteria_id]['total'] += $score->score;
                $criteriaScores[$score->criteria_id]['count'] += 1;
            }

            foreach ($criteriaScores as $criteriaId => $criteriaScore) {
                $criteriaScores[$criteriaId]['average'] = $criteriaScore['total'] / $criteriaScore['count'];
                $criteriaScores[$criteriaId]['weighted'] = $criteriaScores[$criteriaId]['average'] * $criteriaWeights[$criteriaId];
                $overallScore += $criteriaScores[$criteriaId]['weighted'];
            }

            $contestant->criteria_scores = $criteriaScores;
            $contestant->overall_score = $overallScore;

            return $contestant;
        });

        return $dataTable->render('home', compact('contestantsWithScores'));
    }
}
