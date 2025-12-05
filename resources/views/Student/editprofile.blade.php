@extends('layouts.app')

@section('title', 'Edit Student Profile')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded-4 border-0 mx-auto" style="max-width: 600px;">
        <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
            <i class="bi bi-pencil-square fs-3"></i>
            <h4 class="mb-0 fw-semibold">Edit Profile</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action ="{{ route('Student.editprofile', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name', $student->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email', $student->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
