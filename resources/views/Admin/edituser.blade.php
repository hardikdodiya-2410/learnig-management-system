@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Edit User</h3>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('admin.edituser', $user->id) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" value="{{ $user->id }}">

               
                <div class="mb-4">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', $user->name) }}" required>
                </div>

               
                <div class="mb-4">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $user->email) }}" required>
                </div>

                
                <div class="mb-4">
                    <label class="form-label fw-semibold">Role</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="" disabled>Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}"
                                {{ old('role', $user->roles->pluck('name')->first()) == $role->name ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                
                <div id="student_fields"
                    style="{{ $user->roles->pluck('name')->first() == 'Student' ? '' : 'display:none;' }}">

                   
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Course</label>
                        <select name="course_id" id="course" class="form-select">
                            <option value="">Select Course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ old('course_id', optional($student_has_course)->course_id) == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" id="course_name" name="course_name">
                    </div>

                   
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Enrollment Number</label>
                        <input type="text" name="enrollment_no" id="enrollment_no"
                               class="form-control"
                               value="{{ $user->enrollment_no }}">
                    </div>

                </div>

               
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">Update User</button>
                    <a href="{{ route('admin.viewuser') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                </div>

                <input type="hidden" name="created_by" value="{{ $user->created_by }}">
            </form>

        </div>
    </div>
</div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
$(document).ready(function () {

  
    $('#role').on('change', function () {
        const role = $(this).val().toLowerCase();

        if (role === 'student') {
            $('#student_fields').slideDown();
        } else {
            $('#student_fields').slideUp();
        }
    });

   
    $('#course').on('change', function () {
        const selectedText = $(this).find("option:selected").text();
        $('#course_name').val(selectedText);
    }).trigger('change');

});
</script>
