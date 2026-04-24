@extends('layouts.app')
@section('title', 'Add Evaluation')

@section('content')
 <div class="container-fluid border ">
        <h2 class="text-center fw-bold pt-3">Add Evaliation</h2>
        <div class="container d-flex justify-content-center">
            <form action="{{ route('evaluation.store') }}" method="POST" class="col-lg-4">
                @csrf
                <div class="mb-2">
                    <label for="candidate_id" class="form-label">Select Candidate</label>
                    <select name="candidate_id" id="candidate_id" class="form-control @error('candidate_id') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach($candidates as $candidate)
                            <option value="{{ $candidate->id }}">{{ $candidate->name }}</option>
                        @endforeach
                    </select>
                    @error('candidate_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="round_type" class="form-label">Interview Round</label>
                    <select name="round_type" id="round_type" class="form-control @error('round_type') is-invalid @enderror">
                        <option value="">Select </option>
                        <option value="HR Round">HR Round</option>
                        <option value="Technical Round">Technical Round</option>
                        <option value="Task Round">Task Round</option>
                    </select>
                    @error('round_type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="score" class="form-label">Score / Rating </label>
                    <input type="number" name="score" id="score" min="1" max="10" 
                           class="form-control ">
                    @error('score')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="feedback" class="form-label">Feedback / Remarks</label>
                    <textarea name="feedback" id="feedback" rows="4" 
                              class="form-control"></textarea>
                    @error('feedback')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Evaluation</button>
                </div>
            </form>
        </div>
    </div>

@endsection