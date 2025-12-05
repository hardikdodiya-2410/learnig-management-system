@extends('layouts.app')

@section('title', 'View Results')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Student Results</h2>

    <table class="table table-bordered">
        <thead class="table-dark" >
            <tr>    
                <th>Student Name</th>
                <th>Course Name</th>
                <th>Total Marks</th>
                <th>Percentage</th>
                <th>Grade</th>
                <th>Result</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                @php
                    $result = $results[$student->id] ?? null;
                @endphp
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $result->course_name ?? 'N/A' }}</td>
                    <td>{{ $result->total_marks ?? 'N/A' }}</td>
                    <td>{{ $result->percentage ?? 'N/A' }}</td>
                    <td>{{ $result->grade ?? 'N/A' }}</td>
                    <td>{{ $result->result ?? 'N/A' }}</td>
                    <td>
                        @if ($result)
                            <a  href="{{ route('admin.detailresult', $student->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="{{ route('admin.editmarks', $result->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                    <form action="{{ route('admin.deletemarks', $result->id) }}" method="POST" style="display:inline-block;" class="delete-marks-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm delete-marks-btn">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                            
                        @else
                        <a href="{{ route('admin.addmarks', ['id' => $student->id]) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Create
                        </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-marks-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this marks entry?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    btn.closest('form').submit();
                }
            });
        });
    });
});
</script>
