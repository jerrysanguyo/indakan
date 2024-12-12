@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-1">
                <span class="fs-3">Scoring for barangay {{ $contestant->barangay }}</span>
                    @if(Auth::user()->type === 'user')
                        <a href="{{ route('user.home') }}" class="text-decoration-none">
                        @elseif(Auth::user()->type === 'admin')
                        <a href="{{ route('admin.home') }}" class="text-decoration-none">
                        @else
                        <a href="{{ route('judge.home') }}" class="text-decoration-none">
                    @endif
                    <button class="btn btn-primary">
                        Back
                    </button>
                </a>
            </div>
            <div class="card shadow border">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            Please be informed that the lowest score that you can input is 70 and the highest is 100.
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Criteria</th>
                                <th>Score</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listOfCriteria as $criteria)
                                <tr>
                                    <td>
                                        {{ $criteria->name }}
                                        {{ $criteria->percentage }}%
                                    </td>
                                    <td>
                                        <form action="{{ isset($existingScores[$criteria->id]) 
                                                ? (Auth::user()->type === 'admin' 
                                                    ? route('admin.score.update', ['score' => $existingScores[$criteria->id]->id]) 
                                                    : route('judge.score.update', ['score' => $existingScores[$criteria->id]->id])) 
                                                : (Auth::user()->type === 'admin' 
                                                    ? route('admin.score.store') 
                                                    : route('judge.score.store')) 
                                            }}" method="POST">
                                                @csrf
                                                @if(isset($existingScores[$criteria->id]))
                                                    @method('PUT')
                                                    <input type="hidden" name="score_id" value="{{ $existingScores[$criteria->id]->id }}">
                                                @endif
                                            <input type="hidden" name="criteria_id" value="{{ $criteria->id }}">
                                            <input type="hidden" name="contestant_id" value="{{ $contestant->id }}">
                                            <input 
                                                type="number"  
                                                step="0.01" 
                                                name="score" 
                                                id="score" 
                                                class="form-control" 
                                                value="{{ $existingScores[$criteria->id]->score ?? '' }}" 
                                                max="{{ $criteria->percentage }}" 
                                                min="0"
                                            >
                                    </td>
                                    <td>
                                        @if(!isset($existingScores[$criteria->id]))
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        @else
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
