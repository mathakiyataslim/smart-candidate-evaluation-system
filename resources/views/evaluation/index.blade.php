@extends('layouts.app')
@section('title','Show candidate')
@section('content')
<div class="container mt-3">
    <h2 class="text-center fw-bold align-item-center pt-3 pb-3"> Evaluation Record</h2>
    <a href="{{route('evaluation.create')}}" class="btn btn-primary mb-2">user create</a>
    <table class="table  table-bordered table-hover pt-4 mb-3 text-center myTable ">
        <thead class="table-dark text-white">
            <tr>
                <th>Candidate Name</th>
                <th>round_type</th>
                <th>Feedback</th>
                <th>Score</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluations as $evaluation )
            <tr>
                <td>{{ $evaluation->candidate->name }}</td>
                <td>{{ $evaluation->round_type }}</td>
                <td>{{ $evaluation->feedback }}</td>
                <td>{{ $evaluation->score }}</td>

                <td>
                    <a href="{{ route('evaluation.edit', $evaluation->id) }}" class="btn  btn-success ">Edit</a>

                    <form action="{{ route('evaluation.destroy', $evaluation->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE') 
                        
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection