@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-1">
                <span class="fs-3">Scoring for {{ $contestant->name }}</span>
                <a href="{{ route('admin.home') }}" class="text-decoration-none">
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
                            <form action="{{ route('admin.score.store') }}" method="post">
                                @csrf
                                <tr>
                                    <td>
                                        {{ $criteria->name }}
                                        <input type="number" name="criteria_id" id="criteria_id" class="form-control" value="{{ $criteria->id }}" hidden>
                                        <input type="number" name="contestant_id" id="contestant_id" class="form-control" value="{{ $contestant->id }}" hidden>
                                    </td>
                                    <td>
                                        <input type="number" name="score" id="score" class="form-control" value="{{ $existingScores[$criteria->id]->score ?? '' }}" {{ isset($existingScores[$criteria->id]) ? 'readonly' : '' }}>
                                    </td>
                                    <td>
                                        @if(!isset($existingScores[$criteria->id]))
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                        @else
                                            <span class="text-muted">Score already submitted</span>
                                        @endif
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
