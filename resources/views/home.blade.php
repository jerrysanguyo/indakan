@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between mb-1">
                <span class="fs-3">Contestant</span>
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

                    <table class="table table-striped" id="contestant-table">
                        <thead>
                            <tr>
                                <th>Contestant name</th>
                                <th>Criteria #1 (30%)</th>
                                <th>Criteria #2 (30%)</th>
                                <th>Criteria #3 (20%)</th>
                                <th>Criteria #4 (20%)</th>
                                <th>Overall score</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contestantsWithScores as $contestant)
                            <tr>
                                <td>{{ $contestant->name }}</td>
                                <td>{{ number_format($contestant->criteria_scores[1]['total'] ?? 0, 2) }}</td>
                                <td>{{ number_format($contestant->criteria_scores[2]['total'] ?? 0, 2) }}</td>
                                <td>{{ number_format($contestant->criteria_scores[3]['total'] ?? 0, 2) }}</td>
                                <td>{{ number_format($contestant->criteria_scores[4]['total'] ?? 0, 2) }}</td>
                                <td>{{ number_format($contestant->overall_score, 2) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            @if(Auth::user()->type === 'user')
                                                <li><a class="dropdown-item" href="{{ route('user.contestant.show', ['contestant' => $contestant->id]) }}">Details</a></li>
                                                @elseif(Auth::user()->type === 'admin')
                                                    <li><a class="dropdown-item" href="{{ route('admin.score.vote', ['contestant' => $contestant->id]) }}">Score</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('admin.contestant.show', ['contestant' => $contestant->id]) }}">Details</a></li>
                                                @else
                                                    <li><a class="dropdown-item" href="{{ route('judge.score.vote', ['contestant' => $contestant->id]) }}">Score</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('judge.contestant.show', ['contestant' => $contestant->id]) }}">Details</a></li>
                                            @endif
                                        </ul>
                                    </div>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#contestant-table').DataTable({
                "processing": true,
                "serverSide": false,
                "pageLength": 10,
                "order": [[0, "desc"]],
            });
        });
    </script>
@endpush
@endsection
