<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contestant;
use App\Models\Score;
use App\Models\Criteria;
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
        $criteriaPercentages = Criteria::getPercentages();

        $contestantsWithScores = $getAllContestants->map(function ($contestant) use ($criteriaPercentages) {
            $scores = Score::getGroupedScoresByCriteria($contestant->id);

            $criteriaScores = [];
            $overallScore = 0;

            foreach ($scores as $score) {
                $criteriaId = $score->criteria_id;
                $totalScore = $score->total; // Total score from SUM(score)
                $judgeCount = $score->count > 0 ? $score->count : 1; // Avoid division by zero
                $aveTotalScore = $score->total / $judgeCount; // Average of score per criteria
                $averageScore = $totalScore / $judgeCount; // Calculate average score

                // Get the percentage for this criteria (max percentage is the percentage weight)
                $percentage = $criteriaPercentages[$criteriaId] ?? 0; // Default to 0 if not found

                // Weighted score based on max percentage
                $weightedAverage = ($averageScore / $percentage) * $percentage;

                // Store the calculated values
                $criteriaScores[$criteriaId] = [
                    'total' => $aveTotalScore,
                    'count' => $judgeCount,
                    'average' => $averageScore,
                    'weighted' => $weightedAverage,
                    'percentage' => $percentage,
                ];

                // Add the weighted average to the overall score
                $overallScore += $weightedAverage;
            }

            // Attach criteria scores and overall score to the contestant object
            $contestant->criteria_scores = $criteriaScores;
            $contestant->overall_score = $overallScore;

            return $contestant;
        });
        
        return $dataTable->render('home', compact('contestantsWithScores'));

        // out of 100.
        // divide the score depends on the corresponding percentage in criteria.
        // sum the ave of 4 criteria to get the overall score.
        // $contestantsWithScores = $getAllContestants->map(function ($contestant) {
        //     $scores = Score::where('contestant_id', $contestant->id)->get();

            
        //     $criteriaScores = [];
        //     $overallScore = 0;
        //     $criteriaWeights = [
        //         1 => 0.4,
        //         2 => 0.3,
        //         3 => 0.2,
        //         4 => 0.1
        //     ];

        //     foreach ($scores as $score) {
        //         if (!isset($criteriaScores[$score->criteria_id])) {
        //             $criteriaScores[$score->criteria_id] = [
        //                 'total' => 0,
        //                 'count' => 0
        //             ];
        //         }

        //         $criteriaScores[$score->criteria_id]['total'] += $score->score;
        //         $criteriaScores[$score->criteria_id]['count'] += 1;
        //     }

        //     foreach ($criteriaScores as $criteriaId => $criteriaScore) {
        //         $criteriaScores[$criteriaId]['average'] = $criteriaScore['total'] / $criteriaScore['count'];
        //         $criteriaScores[$criteriaId]['weighted'] = $criteriaScores[$criteriaId]['average'] * $criteriaWeights[$criteriaId];
        //         $overallScore += $criteriaScores[$criteriaId]['weighted'];
        //     }

        //     $contestant->criteria_scores = $criteriaScores;
        //     $contestant->overall_score = $overallScore;

        //     return $contestant;
        // });

        // return $dataTable->render('home', compact('contestantsWithScores'));
    }
}
