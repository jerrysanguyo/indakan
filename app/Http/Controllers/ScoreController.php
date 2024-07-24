<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Criteria;
use App\Models\Contestant;
use Illuminate\Http\Request;
use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;
use Illuminate\Support\Facades\Log;

class ScoreController extends Controller
{
    public function vote(Request $request, Contestant $contestant)
    {
        $listOfCriteria = Criteria::getAllCriteria();    
        $existingScores = Score::where('contestant_id', $contestant->id)
        ->where('scored_by', auth()->id())
        ->get()
        ->keyBy('criteria_id');

        return view('score.index', compact(
            'listOfCriteria',
            'contestant',
            'existingScores'
        ));
    }
    
    public function store(StoreScoreRequest $request)
    {
        $validated = $request->validated();
        $validated['scored_by'] = auth()->id();
        $validated['updated_by'] = auth()->id();

        try 
        {
            Score::create($validated);

            $contestantId = $validated['contestant_id'];

            $route = auth()->user()->type === 'judge' ? 'judge.score.vote' : 'admin.score.vote';
            return redirect()->route($route, $contestantId)->with('success', 'Score added successfully!');
        } 
        catch (\Exception $e) 
        {
            Log::error('Failed to store score', ['error' => $e->getMessage()]);
            
            $contestantId = $validated['contestant_id'];

            $route = auth()->user()->type === 'judge' ? 'judge.score.vote' : 'admin.score.vote';
            return redirect()->route($route, $contestantId)->with('error', 'Failed to add score. Please try again.');
        }
    }
}
