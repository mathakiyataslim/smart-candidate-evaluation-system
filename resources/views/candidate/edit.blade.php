@extends('layouts.app')
@section('title','candidate-edit')
@section('content')
<div class="container-fluid border">
    <h2 class="text-center fw-bold pt-3">Edit candidate</h2>
    <div class="container d-flex justify-content-center">
        <form action="{{route('candidate.update',$candidate->id)}}" method="post" enctype="multipart/form-data" class="col-lg-4">
            @csrf
            @method('put')
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" value="{{$candidate->name}}" class="form-control">
            </div>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{$candidate->email}}" class="form-control">
            </div>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label for="phone" class="form-label">phone</label>
                <input type="text" name="phone" value="{{$candidate->phone}}" class="form-control">
            </div>
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-2">

                <div class="mb-3">
                    <label for="resume" class="form-label">Upload Resume (PDF, DOCX)</label>
                    <input type="file" name="resume_path" id="resume" value="{{$candidate->resume_path}}" class="form-control" accept=".pdf,.doc,.docx">
                </div>
                @if($candidate->resume_path)
                <div class="mt-2">
                    <small class="text-muted">Current File:</small>
                    <a href="{{ asset('storage/' . $candidate->resume_path) }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-file-pdf"></i> View Current Resume
                    </a>
                </div>
                @endif
            </div>
            @error('resume_path')
            <div class="text-danger">{{ $message }}</div>
            @enderror


            <button type="submit" class="btn btn-primary mb-2 m-2">Submit</button>
        </form>
    </div>
</div>

</body>

@endsection