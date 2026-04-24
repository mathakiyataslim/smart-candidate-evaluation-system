@extends('layouts.app')
@section('title', 'Add Evaluation')

@section('content')
<div class="container-fluid border ">
    <h2 class="text-center fw-bold pt-3">Edit Evaliation</h2>
    <div class="container d-flex justify-content-center">
        <form action="{{ route('evaluation.update', $evaluation->id) }}" method="POST" class="col-lg-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Candidate: <strong>{{ $evaluation->candidate->name }}</strong></label>
                <input type="hidden" name="candidate_id" value="{{ $evaluation->candidate_id }}">
            </div>

            <div class="mb-3">
                <label>Round Type</label>
                <select name="round_type" class="form-control">
                    <option value="HR Round" {{ $evaluation->round_type == 'HR Round' ? 'selected' : '' }}>HR Round</option>
                    <option value="Technical Round" {{ $evaluation->round_type == 'Technical Round' ? 'selected' : '' }}>Technical Round</option>
                    <option value="Task Round" {{ $evaluation->round_type == 'Task Round' ? 'selected' : '' }}>Task Round</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Score</label>
                <input type="number" name="score" value="{{ $evaluation->score }}" class="form-control" min="1" max="10">
            </div>

            <div class="mb-3">
                <label>Feedback</label>
                <textarea name="feedback" class="form-control">{{ $evaluation->feedback }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Evaluation</button>
        </form>
    </div>
</div>

@endsection