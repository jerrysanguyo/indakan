<?php

namespace App\Http\Controllers;

use App\Models\Contestant;
use App\Http\Requests\StoreContestantRequest;
use App\Http\Requests\UpdateContestantRequest;

class ContestantController extends Controller
{
    public function index()
    {
        return view('contestant.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContestantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contestant $contestant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contestant $contestant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContestantRequest $request, Contestant $contestant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contestant $contestant)
    {
        //
    }
}
