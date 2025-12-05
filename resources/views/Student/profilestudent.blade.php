@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded-4 border-0 w-75 mx-auto">
        @if(session('success'))
            <div class="alert alert-success mb-0">{{ session('success') }}</div>
        @endif

        <div class="card-header d-flex justify-content-between align-items-center bg-light border-bottom">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left-circle me-1"></i> Back
            </a>
            <h5 class="mb-0 fw-semibold">Student Profile</h5>
            <a href="{{ route('Student.editprofile', $student->id) }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-pencil-square me-1"></i> Edit
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 fw-bold text-muted">Name:</div>
                <div class="col-md-8">{{ $student->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold text-muted">Email:</div>
                <div class="col-md-8">{{ $student->email }}</div>
            </div>
            <div class="row">
                <div class="col-md-4 fw-bold text-muted">Registered At:</div>
                <div class="col-md-8">{{ $student->created_at->format('d M Y') }}</div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm rounded-4 border-0 w-75 mx-auto mt-5">
        <div class="card-header d-flex justify-content-between align-items-center bg-light border-bottom">
            <h5 class="mb-0 fw-semibold">Enrolled Course</h5>
            <div>
                <a href="{{ route('admin.detailresult', $student->id) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-eye-fill me-1"></i> View Result
                </a>
                <button class="btn btn-outline-secondary btn-sm" id="viewDetailsBtn" onclick="viewDetails()">
                    <i class="bi bi-eye-fill me-1"></i> View Subjects
                </button>
            </div>
        </div>

        <div class="card-body">
            <h4 class="text-primary">{{ $student_course_name }}</h4>
        </div>

        <div class="card-footer bg-light d-none" id="courseDetails">
            <h6 class="fw-bold mb-3">Subjects</h6>
            @php
                $subjects = json_decode($course->subjects ?? '[]', true);
            @endphp

            @if(is_array($subjects) && count($subjects))
                <ul class="list-group mb-3">
                    @foreach($subjects as $subject)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $subject }}
                            <span class="badge bg-secondary">Subject</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No subjects available for this course.</p>
            @endif

            <div class="text-end">
                <button class="btn btn-outline-secondary btn-sm" onclick="hideDetails()">
                    <i class="bi bi-eye-slash-fill me-1"></i> Hide Subjects
                </button>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    function viewDetails() {
        document.getElementById('courseDetails').classList.remove('d-none');
        document.getElementById('viewDetailsBtn').classList.add('d-none');
    }

    function hideDetails() {
        document.getElementById('courseDetails').classList.add('d-none');
        document.getElementById('viewDetailsBtn').classList.remove('d-none');
    }
</script>

