@extends('layouts.app')

@section('title', 'Course Details')

@section('content')

<div class="container mt-5">
    
    <div class="card ">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center ">
            <h3 class="mb-0">Course Details</h3>
            <a href="{{ route('admin.viewcourse') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Back to Courses
            </a>
        </div>
        <div class="card-body">
            <div class="mb-2">
                <h4 class="fw-bold"><strong >Course Name:</strong> {{ $course->name }}</h4>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <strong>Duration:</strong> {{ $course->duration }}
                    </div>
                    <div class="col-md-6 mb-2">
                        <strong>Created At:</strong> {{ $course->created_at->format('d M Y') }}
                    </div>
                </div>
                <div class="mt-1">
                    <strong>Description:</strong>
                    <p class="mt-1">{{ $course->description }}</p>
                </div>
            </div>

            <hr>
            @php
                $subjects = json_decode($course->subjects, true);
            @endphp

            @if(is_array($subjects))
                <ul class="list-group list-group-flush mb-3 ">
                    @foreach($subjects as $subject)
                        <li class="list-group-item fw-bold ">{{ $subject }}</li>
                    @endforeach
                </ul>
            @endif


        </div>
    </div>
</div>
@endsection
