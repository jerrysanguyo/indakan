<?php

namespace App\Http\Controllers;

use App\Services\ScoreService;
use App\Models\Criteria;
use App\Models\Score;
use App\Models\Contestant;
use Illuminate\Http\Request;
use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;

class ScoreController extends Controller
{
    protected $scoreService;

    public function __construct(ScoreService $scoreService)
    {
        $this->scoreService = $scoreService;
    }

    public function vote(Request $request, Contestant $contestant)
    {
        $listOfCriteria = Criteria::getAllCriteria();    
        $existingScores = $this->scoreService->getExistingScores($contestant->id, auth()->id());

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

        $result = $this->scoreService->storeScore($validated);

        $route = auth()->user()->type === 'judge' ? 'judge.score.vote' : 'admin.score.vote';
        
        return redirect()->route($route, $validated['contestant_id'])
        ->with($result['success'] ? 'success' : 'error', $result['success'] ? 'Score added successfully!' : 'Failed to add score. Please try again.');    
    }

    public function update(UpdateScoreRequest $request, Score $score)
    {
        $validated = $request->validated();
        $validated['updated_by'] = auth()->id();

        $result = $this->scoreService->updateScore($validated, $score);

        $route = auth()->user()->type === 'judge' ? 'judge.score.vote' : 'admin.score.vote';
        
        return redirect()->route($route, $validated['contestant_id'])
        ->with($result['success'] ? 'success' : 'error', $result['success'] ? 'Score updated successfully!' : 'Failed to update score. Please try again.');    
    }
}
