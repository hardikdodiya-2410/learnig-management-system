    @extends('layouts.app')

    @section('title', 'Add User')

    @section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Add New User</h2>
                <a href="{{ route('admin.viewuser') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left-circle me-1"></i> Back to Users
                </a>
            </div>
            @php
                $id = auth()->user()->id; 
            @endphp
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        <form action="{{ route('admin.storeuser') }}" method="POST" class="shadow p-4 bg-light rounded">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Select Role</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="" disabled selected>-- Select Role --</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3" id="enrollment-field" style="display: none;">
                <label for="enrollment_no" class="col-md-2 col-form-label">Enrollment Number</label>
                <div class="col-md-10">
                    <input type="text" name="enrollment_no" id="enrollment_no"class="form-control"placeholder="Enter enrollment number"minlength="10"maxlength="10"pattern="\d{10}"title="Enrollment number must be exactly 10 digits">
                </div>
            </div>
            <input type="hidden" name="created_by" id="created_by" value="{{ $id }}">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-person-plus me-1"></i> Add User
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('role');
            const enrollmentField = document.getElementById('enrollment-field');

            roleSelect.addEventListener('change', function () {
                if (roleSelect.value === 'Student') {
                    enrollmentField.style.display = 'block';
                } else {
                    enrollmentField.style.display = 'none';
                }
            });
        });
    </script>
    @endsection

