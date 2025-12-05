@extends('layouts.app')

@section('title', 'View Courses')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Courses</h2>
           @can('add course')
            <a href="{{ route('admin.addcourse') }}" class="btn btn-success"><i class="bi bi-plus-circle me-1"></i> Add New Course</a>
        @endcan
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($courses->count())
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $index => $course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->duration }}</td>
                        <td>{{ Str::limit($course->description, 50) }}</td>
                        <td>{{ $course->created_at->format('d M Y') }}</td>
                        <td>
                            @can('edit course')
                            <a href="{{ route('admin.editcourse', $course->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>
                            @endcan
                            @can('delete course')
                            <form action="{{ route('admin.deletecourse', $course->id) }}" method="POST" class="d-inline delete-course-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger rounded delete-course-btn">
                                    <i class="bi bi-trash3 me-1"></i> Delete
                                </button>
                            </form>
                            @endcan
                            @can('view course')
                            <a href="{{ route('Student.detailcourse', $course->id) }}" class="btn btn-sm rounded btn-success text-white border-success">
                                <i class="bi bi-eye me-1"></i> View
                            </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
         {{ $courses->links() }}
        </div>
    </div>
    @else
        <div class="alert alert-info">No courses found.</div>
    @endif
</div>

<script>
    document.querySelectorAll('.delete-course-btn').forEach(btn => {
    btn.onclick = () => Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this course?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then(result => result.isConfirmed && btn.closest('form').submit());
    });
</script>
@endsection
