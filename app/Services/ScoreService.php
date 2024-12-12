<?php

namespace App\Services;

use App\Models\Score;
use Illuminate\Support\Facades\Log;

class ScoreService
{
    public function getExistingScores($contestantId, $scoredBy)
    {
        return Score::where('contestant_id', $contestantId)
                    ->where('scored_by', $scoredBy)
                    ->get()
                    ->keyBy('criteria_id');
    }

    public function storeScore(array $data)
    {
        try {
            Score::create($data);
            return ['success' => true, 'message' => 'Score added successfully!'];
        } catch (\Exception $e) {
            Log::error('Failed to store score', ['error' => $e->getMessage()]);
            return ['success' => false, 'message' => 'Failed to add score. Please try again.'];
        }
    }

    public function updateScore(array $data, Score $score): array
    {
        try
        {
            $score->update($data);
            return ['score' => $score, 'success' => true, 'message' => 'Score updated successfully!'];
        } catch (\Exception $e) {
            Log::error('Failed to store score', ['error' => $e->getMessage()]);
            return ['success' => false, 'message' => 'Failed to update score. Please try again.'];
        }
    }
}
