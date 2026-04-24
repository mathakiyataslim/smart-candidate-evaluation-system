@extends('layouts.app')
@section('title','Show candidate')
@section('content')
<div class="container mt-3">
    <h2 class="text-center fw-bold align-item-center pt-3 pb-3"> Candidte Record</h2>
    <a href="{{route('candidate.create')}}" class="btn btn-primary mb-2">candidate create</a>
    <table class="table  table-bordered table-hover pt-4 mb-3 text-center myTable ">
        <thead class="table-dark text-white">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>phone</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($candidates as $candidate )
            <tr>
                <td>{{$candidate->id}}</td>
                <td>{{$candidate->name}}</td>
                <td>{{$candidate->email}}</td>
                <td>{{$candidate->phone}}</td>
                <td>{{$candidate->resume_path}}</td>
                <td>

                    <a href="{{route('candidate.edit',$candidate->id)}}" class="btn  btn-success ">Edit</a>
                    <form action="{{ route('candidate.destroy', $candidate->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection